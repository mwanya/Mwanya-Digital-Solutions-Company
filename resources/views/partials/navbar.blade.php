<header class="bg-white/95 backdrop-blur sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            <a href="{{ route('home') }}" class="flex items-center gap-3 min-w-0">
                <img src="{{ asset('images/logo.jpg') }}" alt="Heisen Group Company Limited logo" class="h-14 w-14 rounded-full object-cover ring-2 ring-brand-orange flex-none">
                <div class="leading-tight min-w-0">
                    <span class="block font-extrabold text-brand-dark whitespace-nowrap tracking-wide text-[clamp(9px,2.4vw,15px)] sm:text-sm">{{ setting('company.name', config('app.company.name')) }}</span>
                    <span class="hidden sm:block text-[10px] sm:text-xs font-semibold text-brand-orange uppercase tracking-wider whitespace-nowrap">Environmental Cleaning &amp; General Supply</span>
                </div>
            </a>

            <nav class="hidden lg:flex items-center gap-8 text-sm font-semibold">
                <a href="{{ route('home') }}" class="hover:text-brand-orange transition {{ request()->routeIs('home') ? 'text-brand-orange' : 'text-brand-dark' }}">Home</a>
                <a href="{{ route('about') }}" class="hover:text-brand-orange transition {{ request()->routeIs('about') ? 'text-brand-orange' : 'text-brand-dark' }}">About</a>
                <a href="{{ route('services.index') }}" class="hover:text-brand-orange transition {{ request()->routeIs('services.*') ? 'text-brand-orange' : 'text-brand-dark' }}">Services</a>
                <a href="{{ route('pricing') }}" class="hover:text-brand-orange transition {{ request()->routeIs('pricing') ? 'text-brand-orange' : 'text-brand-dark' }}">Pricing</a>
                <a href="{{ route('gallery') }}" class="hover:text-brand-orange transition {{ request()->routeIs('gallery') ? 'text-brand-orange' : 'text-brand-dark' }}">Gallery</a>
                <a href="{{ route('leadership') }}" class="hover:text-brand-orange transition {{ request()->routeIs('leadership') ? 'text-brand-orange' : 'text-brand-dark' }}">Leadership</a>
                <a href="{{ route('contact') }}" class="hover:text-brand-orange transition {{ request()->routeIs('contact') ? 'text-brand-orange' : 'text-brand-dark' }}">Contact</a>
            </nav>

            <div class="hidden lg:flex items-center gap-4 flex-none">
                <a href="{{ route('contact') }}" class="lift-hover inline-flex items-center gap-2 rounded-full bg-brand-orange px-5 py-2.5 text-sm font-bold text-white shadow hover:bg-brand-dark transition whitespace-nowrap">
                    Get a Quote <x-icon name="arrow-right" class="w-4 h-4" />
                </a>
            </div>

            <button id="mobile-menu-button" class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-brand-dark" aria-label="Toggle navigation menu">
                <x-icon name="menu" class="w-7 h-7" />
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden lg:hidden border-t border-gray-100 bg-white">
        <div class="px-4 py-4 space-y-1 text-sm font-semibold">
            <a href="{{ route('home') }}" class="block py-2">Home</a>
            <a href="{{ route('about') }}" class="block py-2">About</a>
            <a href="{{ route('services.index') }}" class="block py-2">Services</a>
            <a href="{{ route('pricing') }}" class="block py-2">Pricing</a>
            <a href="{{ route('gallery') }}" class="block py-2">Gallery</a>
            <a href="{{ route('leadership') }}" class="block py-2">Leadership</a>
            <a href="{{ route('contact') }}" class="block py-2">Contact</a>
            <a href="{{ route('contact') }}" class="block mt-3 text-center rounded-full bg-brand-orange px-5 py-2.5 text-white font-bold">Get a Quote</a>
        </div>
    </div>
</header>

<script>
    document.getElementById('mobile-menu-button')?.addEventListener('click', function () {
        document.getElementById('mobile-menu')?.classList.toggle('hidden');
    });
</script>
