@extends('layouts.admin')

@section('title', 'Visitor Analytics')
@section('page_title', 'Visitor Analytics')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        #visitor-map { height: 380px; width: 100%; border-radius: 1rem; z-index: 0; }
        .leaflet-popup-content { font-family: 'Poppins', sans-serif; font-size: 0.8rem; }
    </style>
@endpush

@section('content')

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
        <div class="bg-white rounded-2xl p-6 shadow-sm reveal">
            <div class="h-10 w-10 rounded-lg bg-brand-orange/10 text-brand-orange flex items-center justify-center mb-3"><x-icon name="eye" class="w-5 h-5" /></div>
            <p class="text-xs text-gray-400 font-semibold uppercase">Total Page Views</p>
            <p class="text-3xl font-extrabold mt-1">{{ number_format($totalViews) }}</p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm reveal">
            <div class="h-10 w-10 rounded-lg bg-brand-orange/10 text-brand-orange flex items-center justify-center mb-3"><x-icon name="user-circle" class="w-5 h-5" /></div>
            <p class="text-xs text-gray-400 font-semibold uppercase">Unique Visitors</p>
            <p class="text-3xl font-extrabold mt-1">{{ number_format($uniqueVisitors) }}</p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm reveal">
            <div class="h-10 w-10 rounded-lg bg-green-100 text-green-600 flex items-center justify-center mb-3"><x-icon name="chart-bar" class="w-5 h-5" /></div>
            <p class="text-xs text-gray-400 font-semibold uppercase">Views Today</p>
            <p class="text-3xl font-extrabold mt-1 text-green-600">{{ number_format($viewsToday) }}</p>
        </div>
        <div class="bg-brand-orange rounded-2xl p-6 shadow-sm text-white reveal">
            <div class="h-10 w-10 rounded-lg bg-white/15 flex items-center justify-center mb-3"><x-icon name="clock" class="w-5 h-5" /></div>
            <p class="text-xs font-semibold uppercase opacity-80">Last 7 Days</p>
            <p class="text-3xl font-extrabold mt-1">{{ number_format($viewsLast7Days) }}</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6 mb-6 reveal">
        <h3 class="font-bold mb-4 flex items-center gap-2"><x-icon name="map" class="w-5 h-5 text-brand-orange" /> Where Visitors Are Coming From</h3>
        <div id="visitor-map"></div>
        @if ($mapMarkers->isEmpty())
            <p class="text-sm text-gray-400 text-center mt-4">No location data yet — markers will appear here as real visitors browse the site.</p>
        @endif
    </div>

    <div class="grid lg:grid-cols-3 gap-6 mb-6">
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-6 reveal">
            <h3 class="font-bold mb-4">Traffic Trend — Last 30 Days</h3>
            <canvas id="trendChart" height="110"></canvas>
        </div>
        <div class="bg-white rounded-2xl shadow-sm p-6 reveal">
            <h3 class="font-bold mb-4">Top Countries</h3>
            <canvas id="countryChart" height="160"></canvas>
            @if ($topCountries->isEmpty())
                <p class="text-sm text-gray-400 text-center mt-4">No country data yet.</p>
            @endif
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6 mb-6 reveal">
        <h3 class="font-bold mb-4">Devices</h3>
        <div class="grid grid-cols-3 gap-4 text-center">
            <div class="bg-brand-cream rounded-xl py-4">
                <p class="text-2xl font-extrabold">{{ number_format($deviceBreakdown['desktop'] ?? 0) }}</p>
                <p class="text-xs text-gray-500 mt-1 uppercase tracking-wide">Desktop</p>
            </div>
            <div class="bg-brand-cream rounded-xl py-4">
                <p class="text-2xl font-extrabold">{{ number_format($deviceBreakdown['mobile'] ?? 0) }}</p>
                <p class="text-xs text-gray-500 mt-1 uppercase tracking-wide">Mobile</p>
            </div>
            <div class="bg-brand-cream rounded-xl py-4">
                <p class="text-2xl font-extrabold">{{ number_format($deviceBreakdown['tablet'] ?? 0) }}</p>
                <p class="text-xs text-gray-500 mt-1 uppercase tracking-wide">Tablet</p>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden reveal">
            <div class="px-6 py-4 border-b border-gray-100 font-bold">Most Visited Pages</div>
            <div class="divide-y divide-gray-100">
                @forelse ($topPages as $page)
                    <div class="flex items-center justify-between px-6 py-3 text-sm">
                        <span class="truncate font-mono text-xs text-gray-600">{{ $page->path }}</span>
                        <span class="font-bold text-brand-orange flex-none ml-4">{{ number_format($page->total) }}</span>
                    </div>
                @empty
                    <p class="px-6 py-10 text-center text-gray-400 text-sm">No visits recorded yet.</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden reveal">
            <div class="px-6 py-4 border-b border-gray-100 font-bold">Recent Visits</div>
            <div class="divide-y divide-gray-100 max-h-80 overflow-y-auto">
                @forelse ($recentVisits as $visit)
                    <div class="flex items-center justify-between px-6 py-3 text-sm">
                        <div class="min-w-0">
                            <p class="truncate font-mono text-xs text-gray-600">{{ $visit->path }}</p>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $visit->city ? $visit->city.', ' : '' }}{{ $visit->country ?? 'Unknown location' }} &middot; {{ $visit->created_at?->diffForHumans() }}</p>
                        </div>
                        <span class="flex-none text-[10px] font-bold uppercase bg-brand-cream text-brand-dark px-2 py-1 rounded-full">{{ $visit->device ?? '—' }}</span>
                    </div>
                @empty
                    <p class="px-6 py-10 text-center text-gray-400 text-sm">No visits recorded yet.</p>
                @endforelse
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.3/chart.umd.min.js" integrity="sha512-6c0cTzQZZOZV6M9dXu2ekcuPtWxU+sZCM+yqj6+MZmtHBhOUMsjkSK9eVhBeLYkxLKQ15vaG2z6OFWQ/d8QMtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // Traffic trend line chart
        new Chart(document.getElementById('trendChart'), {
            type: 'line',
            data: {
                labels: @json($dailyLabels),
                datasets: [{
                    label: 'Page Views',
                    data: @json($dailyCounts),
                    borderColor: '#E8611F',
                    backgroundColor: 'rgba(232,97,31,0.1)',
                    fill: true,
                    tension: 0.35,
                    pointRadius: 0,
                    borderWidth: 2,
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, ticks: { maxTicksLimit: 8, font: { size: 10 } } },
                    y: { beginAtZero: true, ticks: { precision: 0 } }
                }
            }
        });

        // Top countries bar chart
        new Chart(document.getElementById('countryChart'), {
            type: 'bar',
            data: {
                labels: @json($topCountries->pluck('country')),
                datasets: [{
                    label: 'Visits',
                    data: @json($topCountries->pluck('total')),
                    backgroundColor: '#231F20',
                    borderRadius: 6,
                }]
            },
            options: {
                indexAxis: 'y',
                plugins: { legend: { display: false } },
                scales: {
                    x: { beginAtZero: true, ticks: { precision: 0 } },
                    y: { grid: { display: false }, ticks: { font: { size: 10 } } }
                }
            }
        });

        // World map of visitor locations (OpenStreetMap tiles, no API key required)
        const map = L.map('visitor-map', { scrollWheelZoom: false }).setView([5, 20], 2);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors',
            maxZoom: 18,
        }).addTo(map);

        const markers = @json($mapMarkers);
        markers.forEach(function (m) {
            if (!m.lat || !m.lng) return;
            const radius = Math.min(6 + Math.sqrt(m.total) * 3, 30);
            L.circleMarker([m.lat, m.lng], {
                radius: radius,
                color: '#E8611F',
                fillColor: '#E8611F',
                fillOpacity: 0.45,
                weight: 1.5,
            }).addTo(map).bindPopup(
                '<strong>' + (m.city || 'Unknown city') + ', ' + (m.country || 'Unknown') + '</strong><br>' + m.total + ' visit' + (m.total > 1 ? 's' : '')
            );
        });
    </script>
@endpush
