<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use App\Services\GeoIpLookup;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class TrackPageView
{
    /**
     * Logs a lightweight analytics record for real visitor traffic on the
     * public site. Deliberately excludes /admin routes, non-GET requests,
     * asset-like paths and obvious bots/crawlers. Never lets a tracking
     * failure break the actual page response.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        try {
            if ($this->shouldTrack($request)) {
                $ip = $request->ip();
                $geo = app(GeoIpLookup::class)->lookup($ip);

                PageView::create([
                    'path' => '/'.ltrim($request->path(), '/'),
                    'ip_address' => $ip,
                    'country' => $geo['country'],
                    'country_code' => $geo['country_code'],
                    'city' => $geo['city'],
                    'latitude' => $geo['lat'],
                    'longitude' => $geo['lon'],
                    'device' => $this->deviceType($request->userAgent()),
                    'referrer' => $request->headers->get('referer') ? substr($request->headers->get('referer'), 0, 255) : null,
                    'created_at' => now(),
                ]);
            }
        } catch (Throwable $e) {
            // Analytics must never break the site.
        }

        return $response;
    }

    private function shouldTrack(Request $request): bool
    {
        if (! $request->isMethod('get')) {
            return false;
        }

        if (str_starts_with($request->path(), 'admin')) {
            return false;
        }

        $userAgent = strtolower((string) $request->userAgent());
        $botSignatures = ['bot', 'crawl', 'spider', 'slurp', 'curl', 'wget', 'facebookexternalhit', 'headless'];
        foreach ($botSignatures as $signature) {
            if (str_contains($userAgent, $signature)) {
                return false;
            }
        }

        return true;
    }

    private function deviceType(?string $userAgent): string
    {
        $ua = strtolower((string) $userAgent);

        if (str_contains($ua, 'tablet') || str_contains($ua, 'ipad')) {
            return 'tablet';
        }

        if (str_contains($ua, 'mobi') || str_contains($ua, 'android') || str_contains($ua, 'iphone')) {
            return 'mobile';
        }

        return 'desktop';
    }
}
