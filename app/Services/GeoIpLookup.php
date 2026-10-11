<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Throwable;

class GeoIpLookup
{
    /**
     * Resolve a visitor's approximate location from their IP address.
     *
     * Uses the free ip-api.com endpoint (no key required, HTTP only).
     * Results are cached per IP for 7 days to avoid repeated lookups for
     * the same visitor, and every failure mode (local IP, offline server,
     * API down, timeout) degrades gracefully to a null/"Unknown" result
     * rather than breaking the page.
     *
     * @return array{country: ?string, country_code: ?string, city: ?string, lat: ?float, lon: ?float}
     */
    public function lookup(?string $ip): array
    {
        $empty = ['country' => null, 'country_code' => null, 'city' => null, 'lat' => null, 'lon' => null];

        if (! $ip || $this->isLocal($ip)) {
            return $empty;
        }

        return Cache::remember("geoip.$ip", now()->addDays(7), function () use ($ip, $empty) {
            try {
                $response = Http::timeout(2)->get("http://ip-api.com/json/{$ip}", [
                    'fields' => 'status,country,countryCode,city,lat,lon',
                ]);

                if (! $response->ok() || $response->json('status') !== 'success') {
                    return $empty;
                }

                return [
                    'country' => $response->json('country'),
                    'country_code' => $response->json('countryCode'),
                    'city' => $response->json('city'),
                    'lat' => $response->json('lat'),
                    'lon' => $response->json('lon'),
                ];
            } catch (Throwable $e) {
                return $empty;
            }
        });
    }

    private function isLocal(string $ip): bool
    {
        return in_array($ip, ['127.0.0.1', '::1']) || str_starts_with($ip, '192.168.') || str_starts_with($ip, '10.');
    }
}
