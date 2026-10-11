@extends('layouts.app')

@section('title', 'Leadership')

@section('content')

    <section class="relative bg-brand-dark text-white py-16 overflow-hidden">
        <div class="absolute -top-10 -right-10 h-72 w-72 rounded-full bg-brand-orange/20 blur-3xl blob-float-1"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-brand-gold font-bold text-xs tracking-widest uppercase">Meet the team</span>
            <h1 class="text-4xl font-extrabold mt-2">Our Leadership</h1>
            <p class="text-gray-300 mt-4 max-w-2xl">The team guiding HEISEN GROUP COMPANY LIMITED's mission to make Tanzania cleaner, safer and healthier.</p>
        </div>
    </section>

    <section class="py-16 bg-brand-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($members as $index => $member)
                    <div class="reveal reveal-delay-{{ ($index % 5) + 1 }} tilt-card bg-white rounded-2xl shadow-sm overflow-hidden">
                        <div class="h-56 bg-brand-dark/[0.04] flex items-center justify-center overflow-hidden">
                            @if ($member->photo_url)
                                <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" class="w-full h-full object-contain" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            @endif
                            <span class="h-24 w-24 rounded-full bg-brand-orange/10 text-brand-orange items-center justify-center {{ $member->photo_url ? 'hidden' : 'flex' }}">
                                <x-icon name="user-circle" class="w-12 h-12" />
                            </span>
                        </div>
                        <div class="p-5">
                            <p class="font-bold">{{ $member->name }}</p>
                            <p class="text-xs text-brand-orange font-bold uppercase tracking-wide mt-1">{{ $member->position }}</p>
                            @if ($member->bio)
                                <p class="text-sm text-gray-600 mt-3 leading-relaxed">{{ $member->bio }}</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 col-span-full text-center py-16">Leadership profiles are being updated. Please check back soon.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
