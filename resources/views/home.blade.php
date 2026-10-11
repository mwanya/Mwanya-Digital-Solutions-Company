@extends('layouts.app')

@section('title', 'Home')

@section('content')

    {{-- HERO --}}
    <section class="relative bg-brand-dark text-white overflow-hidden">
        <div class="absolute inset-0 hero-pattern opacity-40"></div>
        <div class="absolute -top-24 -left-24 h-96 w-96 rounded-full bg-brand-orange/25 blur-3xl blob-float-1"></div>
        <div class="absolute bottom-0 right-0 h-80 w-80 rounded-full bg-brand-gold/15 blur-3xl blob-float-2"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 grid lg:grid-cols-2 gap-12 items-center">
            <div class="reveal">
                <span class="inline-block bg-brand-orange/20 text-brand-gold text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-6">Trusted across Tanzania</span>
                <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight mb-6">
                    Cleaner, Safer, Healthier <span class="text-brand-orange">Environments</span> for Every Space
                </h1>
                <p class="text-gray-300 text-lg mb-8 max-w-xl">
                    HEISEN GROUP COMPANY LIMITED delivers professional cleaning, fumigation, pest control and environmental management services to homes, offices, industries and public institutions across Tanzania.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('contact') }}" class="pulse-glow lift-hover inline-flex items-center gap-2 rounded-full bg-brand-orange px-7 py-3.5 font-bold shadow-lg hover:bg-brand-gold hover:text-brand-dark transition">
                        Request a Free Quote <x-icon name="arrow-right" class="w-4 h-4" />
                    </a>
                    <a href="{{ route('services.index') }}" class="lift-hover inline-flex items-center rounded-full border-2 border-white/30 px-7 py-3.5 font-bold hover:border-brand-gold hover:text-brand-gold transition">Our Services</a>
                </div>

                <div class="mt-12 grid grid-cols-3 gap-6 max-w-md">
                    <div>
                        <p class="text-3xl font-extrabold text-brand-gold">10+</p>
                        <p class="text-xs text-gray-400 mt-1">Service Lines</p>
                    </div>
                    <div>
                        <p class="text-3xl font-extrabold text-brand-gold">TPRI</p>
                        <p class="text-xs text-gray-400 mt-1">Certified Technicians</p>
                    </div>
                    <div>
                        <p class="text-3xl font-extrabold text-brand-gold">TRA/OSHA</p>
                        <p class="text-xs text-gray-400 mt-1">& BRELA Registered</p>
                    </div>
                </div>
            </div>

            <div class="relative reveal reveal-delay-2">
                <div class="rounded-3xl overflow-hidden shadow-2xl ring-4 ring-white/10 rotate-1 hover:rotate-0 transition duration-500">
                    <img src="{{ asset('images/gallery-3.jpg') }}" alt="Heisen Group field technician at work" class="w-full h-[28rem] object-cover object-top">
                </div>
                <div class="absolute -bottom-6 -left-6 bg-white text-brand-dark rounded-2xl shadow-xl px-6 py-4 hidden sm:flex items-center gap-3 blob-float-2">
                    <span class="h-10 w-10 rounded-full bg-brand-orange/10 text-brand-orange flex items-center justify-center flex-none"><x-icon name="leaf" class="w-5 h-5" /></span>
                    <div>
                        <p class="font-extrabold text-brand-orange text-sm">Eco-Friendly</p>
                        <p class="text-xs text-gray-500">Modern tools &amp; integrated pest management</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- VISION / MISSION --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 gap-10">
            <div class="reveal tilt-card bg-brand-cream rounded-2xl p-8 border border-brand-orange/10">
                <div class="h-12 w-12 rounded-full bg-brand-orange/10 flex items-center justify-center mb-4 text-brand-orange"><x-icon name="globe" class="w-6 h-6" /></div>
                <h3 class="text-xl font-extrabold mb-3">Our Vision</h3>
                <p class="text-gray-600 leading-relaxed">To become a global leader in delivering high-quality fumigation, cleaning and environmental management services to both the public and private sectors.</p>
            </div>
            <div class="reveal reveal-delay-2 tilt-card bg-brand-cream rounded-2xl p-8 border border-brand-orange/10">
                <div class="h-12 w-12 rounded-full bg-brand-orange/10 flex items-center justify-center mb-4 text-brand-orange"><x-icon name="target" class="w-6 h-6" /></div>
                <h3 class="text-xl font-extrabold mb-3">Our Mission</h3>
                <p class="text-gray-600 leading-relaxed">To make Tanzania safer and healthier by combating pest-related threats and offering exceptional cleaning services to homes, offices, industries and public institutions.</p>
            </div>
        </div>
    </section>

    {{-- SERVICES --}}
    <section class="py-20 bg-brand-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14 reveal">
                <span class="text-brand-orange font-bold text-xs tracking-widest uppercase">What we do</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold mt-2">Our Core Services</h2>
                <p class="text-gray-600 mt-4">From everyday housekeeping to industrial, water body and agricultural environments, our certified teams are ready to respond wherever you are in Tanzania.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($services as $index => $service)
                    <a href="{{ route('services.show', $service) }}" class="reveal reveal-delay-{{ ($index % 5) + 1 }} tilt-card group bg-white rounded-2xl p-7 shadow-sm hover:shadow-xl transition border border-transparent hover:border-brand-orange/30">
                        <div class="h-14 w-14 rounded-xl bg-brand-orange/10 flex items-center justify-center mb-5 text-brand-orange group-hover:bg-brand-orange group-hover:text-white transition duration-300">
                            <x-icon :name="$service->icon" class="w-7 h-7" />
                        </div>
                        <h3 class="font-bold text-lg mb-2 group-hover:text-brand-orange transition">{{ $service->title }}</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $service->short_description }}</p>
                        <span class="inline-flex items-center gap-1 text-brand-orange text-sm font-semibold mt-4 group-hover:gap-2 transition-all">Learn more <x-icon name="arrow-right" class="w-4 h-4" /></span>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-12 reveal">
                <a href="{{ route('services.index') }}" class="lift-hover inline-flex items-center rounded-full bg-brand-dark text-white px-8 py-3.5 font-bold hover:bg-brand-orange transition shadow-lg">View All Services</a>
            </div>
        </div>
    </section>

    {{-- WHY CHOOSE US --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-14 items-center">
            <div class="grid grid-cols-2 gap-4 reveal">
                <div class="lift-hover aspect-square bg-brand-dark/[0.04] rounded-2xl shadow-md overflow-hidden flex items-center justify-center">
                    <img src="{{ asset('images/gallery-1.jpg') }}" alt="Beach and coastal cleanup" class="w-full h-full object-contain">
                </div>
                <div class="lift-hover aspect-square bg-brand-dark/[0.04] rounded-2xl shadow-md overflow-hidden flex items-center justify-center">
                    <img src="{{ asset('images/gallery-6.jpg') }}" alt="Water body cleaning" class="w-full h-full object-contain">
                </div>
                <div class="lift-hover aspect-square bg-brand-dark/[0.04] rounded-2xl shadow-md overflow-hidden flex items-center justify-center">
                    <img src="{{ asset('images/gallery-9.jpg') }}" alt="Parking lot cleaning" class="w-full h-full object-contain">
                </div>
                <div class="lift-hover aspect-square bg-brand-dark/[0.04] rounded-2xl shadow-md overflow-hidden flex items-center justify-center">
                    <img src="{{ asset('images/gallery-4.png') }}" alt="Office cleaning" class="w-full h-full object-contain">
                </div>
            </div>
            <div class="reveal reveal-delay-2">
                <span class="text-brand-orange font-bold text-xs tracking-widest uppercase">Why Choose {{ setting('company.name', config('app.company.name')) }}</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold mt-2 mb-6">Reliable, Certified &amp; Eco-Conscious</h2>
                <ul class="space-y-5">
                    <li class="flex gap-4">
                        <span class="flex-none h-9 w-9 rounded-full bg-brand-orange text-white flex items-center justify-center"><x-icon name="check-circle" class="w-5 h-5" /></span>
                        <div>
                            <p class="font-bold">TPRI-certified technicians</p>
                            <p class="text-sm text-gray-600">All staff are trained and certified to meet the highest safety and environmental standards.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <span class="flex-none h-9 w-9 rounded-full bg-brand-orange text-white flex items-center justify-center"><x-icon name="check-circle" class="w-5 h-5" /></span>
                        <div>
                            <p class="font-bold">Modern, eco-friendly methods</p>
                            <p class="text-sm text-gray-600">Integrated pest management and eco-friendly products that target root causes, not just symptoms.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <span class="flex-none h-9 w-9 rounded-full bg-brand-orange text-white flex items-center justify-center"><x-icon name="check-circle" class="w-5 h-5" /></span>
                        <div>
                            <p class="font-bold">Nationwide reach</p>
                            <p class="text-sm text-gray-600">Strategically located teams that respond promptly wherever you are within Tanzania.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <span class="flex-none h-9 w-9 rounded-full bg-brand-orange text-white flex items-center justify-center"><x-icon name="check-circle" class="w-5 h-5" /></span>
                        <div>
                            <p class="font-bold">Fully registered &amp; licensed</p>
                            <p class="text-sm text-gray-600">Registered with TRA, OSHA and BRELA, and licensed under the NEST system to operate in Tanzania.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="relative py-16 bg-brand-orange overflow-hidden">
        <div class="absolute -top-16 -left-16 h-64 w-64 rounded-full bg-white/10 blur-3xl blob-float-1"></div>
        <div class="absolute -bottom-16 -right-16 h-64 w-64 rounded-full bg-brand-dark/10 blur-3xl blob-float-2"></div>
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white reveal">
            <h2 class="text-2xl sm:text-3xl font-extrabold mb-4">Ready for a cleaner, safer space?</h2>
            <p class="text-white/90 mb-8 max-w-xl mx-auto">Talk to our team today and get a tailored quote for your home, office, farm or industrial site.</p>
            <a href="{{ route('contact') }}" class="lift-hover inline-flex items-center gap-2 rounded-full bg-brand-dark px-8 py-3.5 font-bold hover:bg-white hover:text-brand-dark transition shadow-xl">
                Contact Us Now <x-icon name="arrow-right" class="w-4 h-4" />
            </a>
        </div>
    </section>

@endsection
