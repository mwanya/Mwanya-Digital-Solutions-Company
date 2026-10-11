@extends('layouts.app')

@section('title', 'Our Services')

@section('content')

    <section class="bg-brand-dark text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-brand-gold font-bold text-xs tracking-widest uppercase">What we offer</span>
            <h1 class="text-4xl font-extrabold mt-2">Our Services</h1>
            <p class="text-gray-300 mt-4 max-w-2xl">Comprehensive cleaning, fumigation, pest control and environmental management services for homes, offices, industries, farms and public institutions.</p>
        </div>
    </section>

    <section class="py-16 bg-brand-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($services as $index => $service)
                    <a href="{{ route('services.show', $service) }}" class="reveal reveal-delay-{{ ($index % 5) + 1 }} tilt-card group bg-white rounded-2xl p-7 shadow-sm hover:shadow-xl transition border border-transparent hover:border-brand-orange/30">
                        <div class="h-14 w-14 rounded-xl bg-brand-orange/10 flex items-center justify-center mb-5 text-brand-orange group-hover:bg-brand-orange group-hover:text-white transition duration-300">
                            <x-icon :name="$service->icon" class="w-7 h-7" />
                        </div>
                        <h3 class="font-bold text-lg mb-2 group-hover:text-brand-orange transition">{{ $service->title }}</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $service->short_description }}</p>
                        <span class="inline-flex items-center gap-1 text-brand-orange text-sm font-semibold mt-4 group-hover:gap-2 transition-all">Learn more <x-icon name="arrow-right" class="w-4 h-4" /></span>
                    </a>
                @empty
                    <p class="text-gray-500 col-span-full text-center py-12">No services published yet. Please check back soon.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
