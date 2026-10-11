@extends('layouts.app')

@section('title', $service->title)

@section('content')

    <section class="bg-brand-dark text-white py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('services.index') }}" class="text-brand-gold text-sm font-semibold">&larr; Back to all services</a>
            <div class="flex items-center gap-4 mt-4">
                <span class="h-16 w-16 rounded-2xl bg-brand-orange/20 flex items-center justify-center text-brand-gold"><x-icon :name="$service->icon" class="w-8 h-8" /></span>
                <h1 class="text-3xl sm:text-4xl font-extrabold">{{ $service->title }}</h1>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-3 gap-10">
            <div class="md:col-span-2 reveal">
                <p class="text-gray-700 leading-relaxed text-lg">{{ $service->description }}</p>

                <div class="mt-10 bg-brand-cream rounded-2xl p-8 border border-brand-orange/10">
                    <h3 class="font-bold text-lg mb-2">Need this service?</h3>
                    <p class="text-gray-600 text-sm mb-5">Get in touch with our team for a free, no-obligation quote tailored to your needs.</p>
                    <a href="{{ route('contact') }}" class="lift-hover inline-flex items-center gap-2 rounded-full bg-brand-orange text-white px-6 py-3 font-bold hover:bg-brand-dark transition shadow-md">Request a Quote <x-icon name="arrow-right" class="w-4 h-4" /></a>
                </div>
            </div>

            <aside>
                <h4 class="font-bold text-sm uppercase tracking-widest text-gray-400 mb-4">Other Services</h4>
                <div class="space-y-4">
                    @foreach ($related as $item)
                        <a href="{{ route('services.show', $item) }}" class="flex items-center gap-3 bg-brand-cream hover:bg-brand-orange/10 rounded-xl p-4 transition">
                            <span class="flex-none h-10 w-10 rounded-lg bg-brand-orange/10 flex items-center justify-center text-brand-orange">
                                <x-icon :name="$item->icon" class="w-5 h-5" />
                            </span>
                            <span class="font-semibold text-sm">{{ $item->title }}</span>
                        </a>
                    @endforeach
                </div>
            </aside>
        </div>
    </section>

@endsection
