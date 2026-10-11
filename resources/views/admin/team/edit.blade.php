@extends('layouts.admin')

@section('title', 'Edit Leadership Profile')
@section('page_title', 'Edit Leadership Profile')

@section('content')

    <div class="bg-white rounded-2xl shadow-sm p-8 max-w-2xl">

        @if ($member->photo_url)
            <div class="mb-6">
                <p class="text-sm font-semibold mb-2">Current Photo</p>
                <div class="flex items-center gap-4">
                    <div class="w-40 h-40 bg-brand-dark/[0.04] rounded-xl flex items-center justify-center overflow-hidden flex-none">
                        <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" class="w-full h-full object-contain"
                             onerror="this.closest('div').innerHTML='<span class=\'text-xs text-red-500 px-3 text-center\'>Image failed to load — the file may be missing. Try uploading again.</span>'">
                    </div>
                    <form method="POST" action="{{ route('admin.team.photo.destroy', $member) }}" onsubmit="return confirm('Remove this photo? The profile will show the placeholder icon until a new photo is uploaded.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center gap-2 text-sm font-semibold text-red-600 hover:underline">
                            <x-icon name="trash" class="w-4 h-4" /> Remove Photo
                        </button>
                    </form>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.team.update', $member) }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold mb-2">{{ $member->photo_url ? 'Replace Photo (optional)' : 'Photo' }}</label>
                <label for="photo" class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-gray-300 rounded-xl py-8 cursor-pointer hover:border-brand-orange hover:bg-brand-cream transition text-gray-400">
                    <x-icon name="upload" class="w-7 h-7" />
                    <span class="text-sm font-semibold" id="photo-filename">Click to choose a photo</span>
                </label>
                <input type="file" name="photo" id="photo" accept="image/*" class="hidden">
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold mb-2">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $member->name) }}" required class="w-full">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Position / Title</label>
                    <input type="text" name="position" value="{{ old('position', $member->position) }}" required class="w-full">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Short Bio</label>
                <textarea name="bio" rows="4">{{ old('bio', $member->bio) }}</textarea>
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold mb-2">Display Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $member->sort_order) }}" class="w-full">
                </div>
                <div class="flex items-end">
                    <label class="flex items-center gap-2 text-sm font-semibold">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $member->is_active) ? 'checked' : '' }}>
                        Published (visible on website)
                    </label>
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="rounded-full bg-brand-orange text-white px-7 py-3 font-bold hover:bg-brand-dark transition">Update Profile</button>
                <a href="{{ route('admin.team.index') }}" class="rounded-full border border-gray-300 px-7 py-3 font-bold hover:bg-gray-50 transition">Cancel</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('photo')?.addEventListener('change', function (e) {
            const label = document.getElementById('photo-filename');
            if (e.target.files && e.target.files[0]) label.textContent = e.target.files[0].name;
        });
    </script>

@endsection
