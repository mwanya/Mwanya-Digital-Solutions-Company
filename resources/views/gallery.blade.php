@extends('layouts.app')

@section('title', 'Gallery')

@section('content')

    <section class="relative bg-brand-dark text-white py-16 overflow-hidden">
        <div class="absolute -top-10 -right-10 h-72 w-72 rounded-full bg-brand-orange/20 blur-3xl blob-float-1"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-brand-gold font-bold text-xs tracking-widest uppercase">Our work in action</span>
            <h1 class="text-4xl font-extrabold mt-2">Gallery</h1>
            <p class="text-gray-300 mt-4 max-w-2xl">A look at our teams delivering cleaning, pest control and environmental management services across Tanzania — real activities, real results.</p>
        </div>
    </section>

    <section class="py-16 bg-brand-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($images as $index => $image)
                    <figure class="reveal reveal-delay-{{ ($index % 5) + 1 }} tilt-card rounded-2xl overflow-hidden shadow-sm bg-white group cursor-pointer"
                        onclick="openLightbox('{{ $image->image_url }}', '{{ addslashes($image->title ?: $image->caption) }}')">
                        <div class="aspect-[4/5] w-full bg-brand-dark/[0.04] flex items-center justify-center overflow-hidden">
                            <img src="{{ $image->image_url }}" alt="{{ $image->title ?: $image->caption }}" class="max-w-full max-h-full w-full h-full object-contain group-hover:scale-105 transition duration-500">
                        </div>
                        <figcaption class="px-4 py-3">
                            @if ($image->title)
                                <p class="font-bold text-sm">{{ $image->title }}</p>
                            @endif
                            @if ($image->caption)
                                <p class="text-xs text-gray-500 mt-0.5">{{ $image->caption }}</p>
                            @endif
                        </figcaption>
                    </figure>
                @empty
                    <p class="text-gray-500 col-span-full text-center py-16">No photos published yet. Please check back soon.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Lightbox --}}
    <div id="lightbox" class="fixed inset-0 bg-black/90 z-[100] hidden items-center justify-center p-4" onclick="closeLightbox()">
        <button class="absolute top-6 right-6 text-white hover:text-brand-gold" onclick="closeLightbox()">
            <x-icon name="close" class="w-8 h-8" />
        </button>
        <div class="max-w-4xl w-full">
            <img id="lightbox-img" src="" alt="" class="w-full max-h-[80vh] object-contain rounded-xl">
            <p id="lightbox-caption" class="text-white text-center mt-4 text-sm"></p>
        </div>
    </div>

    <script>
        function openLightbox(src, caption) {
            document.getElementById('lightbox-img').src = src;
            document.getElementById('lightbox-caption').textContent = caption;
            const lb = document.getElementById('lightbox');
            lb.classList.remove('hidden');
            lb.classList.add('flex');
        }
        function closeLightbox() {
            const lb = document.getElementById('lightbox');
            lb.classList.add('hidden');
            lb.classList.remove('flex');
        }
    </script>

@endsection
