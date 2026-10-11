<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageView;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AnalyticsController extends Controller
{
    public function index(): View
    {
        $totalViews = PageView::count();
        $uniqueVisitors = (int) PageView::whereNotNull('ip_address')
            ->selectRaw('COUNT(DISTINCT ip_address) as total')
            ->value('total');
        $viewsToday = PageView::whereDate('created_at', today())->count();
        $viewsLast7Days = PageView::where('created_at', '>=', now()->subDays(7))->count();

        // Daily trend for the last 30 days (fills in zero-view days too).
        $rawDaily = PageView::where('created_at', '>=', now()->subDays(29)->startOfDay())
            ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->groupBy('day')
            ->pluck('total', 'day');

        $dailyLabels = [];
        $dailyCounts = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dailyLabels[] = now()->subDays($i)->format('M j');
            $dailyCounts[] = (int) ($rawDaily[$date] ?? 0);
        }

        // Top countries for the bar chart + table.
        $topCountries = PageView::whereNotNull('country')
            ->select('country', 'country_code', DB::raw('COUNT(*) as total'))
            ->groupBy('country', 'country_code')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        // Map markers: group by rounded coordinates so nearby visits cluster into one marker.
        $mapMarkers = PageView::whereNotNull('latitude')->whereNotNull('longitude')
            ->select(
                DB::raw('ROUND(latitude, 1) as lat'),
                DB::raw('ROUND(longitude, 1) as lng'),
                'city',
                'country',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('lat', 'lng', 'city', 'country')
            ->orderByDesc('total')
            ->limit(200)
            ->get();

        $deviceBreakdown = PageView::select('device', DB::raw('COUNT(*) as total'))
            ->whereNotNull('device')
            ->groupBy('device')
            ->pluck('total', 'device');

        $recentVisits = PageView::latest('created_at')->limit(20)->get();

        $topPages = PageView::select('path', DB::raw('COUNT(*) as total'))
            ->groupBy('path')
            ->orderByDesc('total')
            ->limit(8)
            ->get();

        return view('admin.analytics.index', compact(
            'totalViews',
            'uniqueVisitors',
            'viewsToday',
            'viewsLast7Days',
            'dailyLabels',
            'dailyCounts',
            'topCountries',
            'mapMarkers',
            'deviceBreakdown',
            'recentVisits',
            'topPages'
        ));
    }
}
