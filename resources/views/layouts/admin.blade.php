<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | Heisen Admin</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <script>
        tailwind.config = {
            theme: { extend: { colors: { brand: { orange: '#E8611F', dark: '#231F20', gold: '#F5B82E', cream: '#FFF8F1' } } } }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif; }
        #admin-sidebar { transition: transform .25s ease; }
        .reveal { opacity: 0; transform: translateY(16px); transition: opacity .5s ease, transform .5s ease; }
        .reveal.in-view { opacity: 1; transform: translateY(0); }

        input[type="text"], input[type="email"], input[type="password"],
        input[type="tel"], input[type="number"], input[type="search"],
        input[type="date"], select, textarea {
            width: 100%;
            background-color: #fff;
            border: 1.5px solid #e2dfd9;
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            font-size: 0.925rem;
            color: #231F20;
            box-shadow: 0 1px 2px rgba(35,31,32,0.04);
            transition: border-color .2s ease, box-shadow .2s ease;
            appearance: none;
            -webkit-appearance: none;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus,
        input[type="tel"]:focus, input[type="number"]:focus, input[type="search"]:focus,
        input[type="date"]:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #E8611F;
            box-shadow: 0 0 0 4px rgba(232,97,31,0.15);
        }
        textarea { resize: vertical; min-height: 7rem; }
        input[type="checkbox"], input[type="radio"] {
            width: 1.1rem; height: 1.1rem; accent-color: #E8611F; cursor: pointer;
        }
        select {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23231F20' stroke-width='2'%3e%3cpath d='M6 9l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.9rem center;
            background-size: 1.1rem;
            padding-right: 2.75rem;
        }
        ::placeholder { color: #9b9693; }
        @media (max-width: 1023px) {
            #admin-sidebar { position: fixed; inset: 0 auto 0 0; z-index: 50; transform: translateX(-100%); }
            #admin-sidebar.open { transform: translateX(0); }
            #admin-overlay { transition: opacity .25s ease; }
        }
    </style>
    @stack('styles')
</head>
<body class="bg-brand-cream text-brand-dark antialiased">

    <div id="admin-overlay" class="hidden fixed inset-0 bg-black/50 z-40 lg:hidden"></div>

    <div class="flex min-h-screen">
        <aside id="admin-sidebar" class="w-64 bg-brand-dark text-white flex-shrink-0 flex flex-col">
            <div class="flex items-center gap-3 px-6 py-6 border-b border-white/10">
                <img src="{{ asset('images/logo.jpg') }}" class="h-10 w-10 rounded-full ring-2 ring-brand-gold object-cover" alt="Heisen logo">
                <div class="leading-tight">
                    <p class="font-extrabold text-sm">HEISEN ADMIN</p>
                    <p class="text-[10px] text-gray-400">Control Panel</p>
                </div>
                <button id="admin-sidebar-close" class="ml-auto lg:hidden text-gray-400 hover:text-white">
                    <x-icon name="close" class="w-6 h-6" />
                </button>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-1 text-sm font-semibold overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition {{ request()->routeIs('admin.dashboard') ? 'bg-brand-orange' : 'hover:bg-white/10' }}">
                    <x-icon name="chart-bar" class="w-5 h-5" /> Dashboard
                </a>
                <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition {{ request()->routeIs('admin.services.*') ? 'bg-brand-orange' : 'hover:bg-white/10' }}">
                    <x-icon name="sparkles" class="w-5 h-5" /> Services
                </a>
                <a href="{{ route('admin.pricing.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition {{ request()->routeIs('admin.pricing.*') ? 'bg-brand-orange' : 'hover:bg-white/10' }}">
                    <x-icon name="tag" class="w-5 h-5" /> Pricing
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition {{ request()->routeIs('admin.gallery.*') ? 'bg-brand-orange' : 'hover:bg-white/10' }}">
                    <x-icon name="photo" class="w-5 h-5" /> Gallery / Activities
                </a>
                <a href="{{ route('admin.team.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition {{ request()->routeIs('admin.team.*') ? 'bg-brand-orange' : 'hover:bg-white/10' }}">
                    <x-icon name="user-circle" class="w-5 h-5" /> Leadership
                </a>
                <a href="{{ route('admin.faqs.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition {{ request()->routeIs('admin.faqs.*') ? 'bg-brand-orange' : 'hover:bg-white/10' }}">
                    <x-icon name="chat" class="w-5 h-5" /> Quick Answers
                </a>
                <a href="{{ route('admin.messages.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition {{ request()->routeIs('admin.messages.*') ? 'bg-brand-orange' : 'hover:bg-white/10' }}">
                    <x-icon name="envelope-open" class="w-5 h-5" /> Messages
                </a>
                <a href="{{ route('admin.analytics') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition {{ request()->routeIs('admin.analytics') ? 'bg-brand-orange' : 'hover:bg-white/10' }}">
                    <x-icon name="map" class="w-5 h-5" /> Visitor Analytics
                </a>
                <a href="{{ route('admin.settings.edit') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition {{ request()->routeIs('admin.settings.*') ? 'bg-brand-orange' : 'hover:bg-white/10' }}">
                    <x-icon name="cog" class="w-5 h-5" /> Settings
                </a>
                <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/10 transition">
                    <x-icon name="globe" class="w-5 h-5" /> View Website
                </a>
            </nav>
            <div class="px-4 py-6 border-t border-white/10">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/10 text-sm font-semibold transition">
                        <x-icon name="logout" class="w-5 h-5" /> Sign Out
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0">
            <header class="bg-white shadow-sm px-4 sm:px-6 py-4 flex items-center justify-between gap-3">
                <div class="flex items-center gap-3 min-w-0">
                    <button id="admin-sidebar-open" class="lg:hidden text-brand-dark flex-none">
                        <x-icon name="menu" class="w-6 h-6" />
                    </button>
                    <h1 class="font-extrabold text-base sm:text-lg truncate">@yield('page_title', 'Dashboard')</h1>
                </div>
                <div class="text-xs sm:text-sm text-gray-500 flex-none truncate">
                    <span class="hidden sm:inline">Signed in as </span><span class="font-semibold text-brand-dark">{{ auth()->user()->name ?? 'Admin' }}</span>
                </div>
            </header>

            <main class="flex-1 p-4 sm:p-6">
                @if (session('success'))
                    <div class="bg-green-50 border border-green-300 text-green-800 rounded-lg px-4 py-3 text-sm mb-6">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-300 text-red-700 rounded-lg px-4 py-3 text-sm mb-6">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('admin-overlay');
        const openBtn = document.getElementById('admin-sidebar-open');
        const closeBtn = document.getElementById('admin-sidebar-close');

        function openSidebar() {
            sidebar.classList.add('open');
            overlay.classList.remove('hidden');
        }
        function closeSidebar() {
            sidebar.classList.remove('open');
            overlay.classList.add('hidden');
        }
        openBtn?.addEventListener('click', openSidebar);
        closeBtn?.addEventListener('click', closeSidebar);
        overlay?.addEventListener('click', closeSidebar);

        document.querySelectorAll('.reveal').forEach((el, i) => {
            setTimeout(() => el.classList.add('in-view'), i * 60);
        });
    </script>

    @stack('scripts')

</body>
</html>
