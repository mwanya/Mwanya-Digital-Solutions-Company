<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', setting('company.name', config('app.company.name'))) | @yield('title_suffix', setting('company.tagline', config('app.company.tagline')))</title>
    <meta name="description" content="@yield('meta_description', 'HEISEN GROUP COMPANY LIMITED - Professional environmental cleaning, fumigation, pest control and general supply services in Dar es Salaam, Tanzania.')">

    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">

    <!-- Tailwind CSS (CDN build, no Node build step required) -->
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            orange: '#E8611F',
                            dark: '#231F20',
                            gold: '#F5B82E',
                            cream: '#FFF8F1',
                        }
                    },
                    fontFamily: {
                        sans: ['Poppins', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif; }
        .hero-pattern {
            background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.15) 1px, transparent 0);
            background-size: 22px 22px;
        }

        /* Scroll-reveal animation */
        .reveal { opacity: 0; transform: translateY(28px); transition: opacity .7s cubic-bezier(.2,.65,.3,1), transform .7s cubic-bezier(.2,.65,.3,1); }
        .reveal.in-view { opacity: 1; transform: translateY(0); }
        .reveal-delay-1.in-view { transition-delay: .08s; }
        .reveal-delay-2.in-view { transition-delay: .16s; }
        .reveal-delay-3.in-view { transition-delay: .24s; }
        .reveal-delay-4.in-view { transition-delay: .32s; }
        .reveal-delay-5.in-view { transition-delay: .4s; }

        /* 3D tilt interaction (desktop/mouse only) */
        .tilt-card { transform-style: preserve-3d; transition: transform .25s ease, box-shadow .25s ease; will-change: transform; }
        .tilt-card:hover { box-shadow: 0 25px 50px -12px rgba(35,31,32,0.25); }

        /* Floating decorative blobs */
        @keyframes floatY { 0%, 100% { transform: translateY(0) scale(1); } 50% { transform: translateY(-18px) scale(1.04); } }
        @keyframes floatY2 { 0%, 100% { transform: translateY(0) scale(1); } 50% { transform: translateY(14px) scale(1.06); } }
        .blob-float-1 { animation: floatY 9s ease-in-out infinite; }
        .blob-float-2 { animation: floatY2 11s ease-in-out infinite; }

        /* Lift-on-hover utility for buttons/cards */
        .lift-hover { transition: transform .25s ease, box-shadow .25s ease; }
        .lift-hover:hover { transform: translateY(-4px); }

        @keyframes pulseGlow { 0%, 100% { box-shadow: 0 0 0 0 rgba(232,97,31,0.45); } 70% { box-shadow: 0 0 0 14px rgba(232,97,31,0); } }
        .pulse-glow { animation: pulseGlow 2.4s ease-out infinite; }

        /* Consistent, clearly-visible form fields everywhere (Tailwind's CDN
           build doesn't include the forms-reset plugin, so inputs need an
           explicit, professional style rather than relying on utility classes). */
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
    </style>

    @stack('styles')
</head>
<body class="bg-brand-cream text-brand-dark antialiased overflow-x-hidden">

    @include('partials.navbar')

    <main>
        @if (session('success'))
            <div class="max-w-5xl mx-auto mt-6 px-4">
                <div class="bg-green-50 border border-green-300 text-green-800 rounded-lg px-4 py-3 text-sm shadow-sm">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="max-w-5xl mx-auto mt-6 px-4">
                <div class="bg-red-50 border border-red-300 text-red-800 rounded-lg px-4 py-3 text-sm shadow-sm">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.help-widget')

    @stack('scripts')

    <script>
        // Scroll-reveal: fade/slide elements in as they enter the viewport.
        document.addEventListener('DOMContentLoaded', function () {
            const revealEls = document.querySelectorAll('.reveal');
            if ('IntersectionObserver' in window && revealEls.length) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('in-view');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
                revealEls.forEach((el) => observer.observe(el));
            } else {
                revealEls.forEach((el) => el.classList.add('in-view'));
            }

            // Subtle 3D tilt on cards, mouse-driven only (skipped on touch devices).
            const isTouch = window.matchMedia('(pointer: coarse)').matches;
            if (!isTouch) {
                document.querySelectorAll('.tilt-card').forEach((card) => {
                    card.addEventListener('mousemove', (e) => {
                        const rect = card.getBoundingClientRect();
                        const x = e.clientX - rect.left;
                        const y = e.clientY - rect.top;
                        const rotateX = ((y / rect.height) - 0.5) * -8;
                        const rotateY = ((x / rect.width) - 0.5) * 8;
                        card.style.transform = `perspective(900px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-6px)`;
                    });
                    card.addEventListener('mouseleave', () => {
                        card.style.transform = 'perspective(900px) rotateX(0) rotateY(0) translateY(0)';
                    });
                });
            }
        });
    </script>
</body>
</html>
