@extends('layouts.admin')

@section('title', 'Upload Photo')
@section('page_title', 'Upload Activity Photo')

@section('content')

    <div class="bg-white rounded-2xl shadow-sm p-8 max-w-2xl">
        <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-semibold mb-2">Photo</label>
                <label for="photo" class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-gray-300 rounded-xl py-10 cursor-pointer hover:border-brand-orange hover:bg-brand-cream transition text-gray-400">
                    <x-icon name="upload" class="w-8 h-8" />
                    <span class="text-sm font-semibold" id="photo-filename">Click to choose an image (JPG, PNG or WEBP, max 8MB)</span>
                </label>
                <input type="file" name="photo" id="photo" accept="image/*" required class="hidden">
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold mb-2">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g. Coastal Cleanup Drive" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Event / Date</label>
                    <input type="text" name="event_date" value="{{ old('event_date') }}" placeholder="e.g. March 2026" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Caption</label>
                <textarea name="caption" rows="3" placeholder="Short description shown under the photo" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">{{ old('caption') }}</textarea>
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                    <p class="text-xs text-gray-400 mt-1">Higher numbers appear first in the gallery.</p>
                </div>
                <div class="flex items-end">
                    <label class="flex items-center gap-2 text-sm font-semibold">
                        <input type="checkbox" name="is_active" value="1" checked class="rounded border-gray-300 text-brand-orange focus:ring-brand-orange">
                        Published (visible on website)
                    </label>
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="rounded-full bg-brand-orange text-white px-7 py-3 font-bold hover:bg-brand-dark transition">Upload Photo</button>
                <a href="{{ route('admin.gallery.index') }}" class="rounded-full border border-gray-300 px-7 py-3 font-bold hover:bg-gray-50 transition">Cancel</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('photo')?.addEventListener('change', function (e) {
            const label = document.getElementById('photo-filename');
            if (e.target.files && e.target.files[0]) {
                label.textContent = e.target.files[0].name;
            }
        });
    </script>

@endsection
