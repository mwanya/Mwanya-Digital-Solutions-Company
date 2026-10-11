@extends('layouts.admin')

@section('title', 'Edit Photo')
@section('page_title', 'Edit Gallery Photo')

@section('content')

    <div class="bg-white rounded-2xl shadow-sm p-8 max-w-2xl">

        <div class="mb-6">
            <p class="text-sm font-semibold mb-2">Current Photo</p>
            <img src="{{ $photo->image_url }}" alt="{{ $photo->title }}" class="w-full h-56 object-cover rounded-xl">
        </div>

        <form method="POST" action="{{ route('admin.gallery.update', $photo) }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold mb-2">Replace Photo (optional)</label>
                <label for="photo" class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-gray-300 rounded-xl py-8 cursor-pointer hover:border-brand-orange hover:bg-brand-cream transition text-gray-400">
                    <x-icon name="upload" class="w-7 h-7" />
                    <span class="text-sm font-semibold" id="photo-filename">Click to choose a new image (leave empty to keep current)</span>
                </label>
                <input type="file" name="photo" id="photo" accept="image/*" class="hidden">
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold mb-2">Title</label>
                    <input type="text" name="title" value="{{ old('title', $photo->title) }}" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Event / Date</label>
                    <input type="text" name="event_date" value="{{ old('event_date', $photo->event_date) }}" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Caption</label>
                <textarea name="caption" rows="3" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">{{ old('caption', $photo->caption) }}</textarea>
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $photo->sort_order) }}" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
                <div class="flex items-end">
                    <label class="flex items-center gap-2 text-sm font-semibold">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $photo->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-brand-orange focus:ring-brand-orange">
                        Published (visible on website)
                    </label>
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="rounded-full bg-brand-orange text-white px-7 py-3 font-bold hover:bg-brand-dark transition">Update Photo</button>
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
