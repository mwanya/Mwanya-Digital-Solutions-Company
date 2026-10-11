@extends('layouts.admin')

@section('title', 'Add Leadership Profile')
@section('page_title', 'Add Leadership Profile')

@section('content')

    <div class="bg-white rounded-2xl shadow-sm p-8 max-w-2xl">
        <form method="POST" action="{{ route('admin.team.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-semibold mb-2">Photo</label>
                <label for="photo" class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-gray-300 rounded-xl py-8 cursor-pointer hover:border-brand-orange hover:bg-brand-cream transition text-gray-400">
                    <x-icon name="upload" class="w-7 h-7" />
                    <span class="text-sm font-semibold" id="photo-filename">Click to upload a photo (optional)</span>
                </label>
                <input type="file" name="photo" id="photo" accept="image/*" class="hidden">
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold mb-2">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Position / Title</label>
                    <input type="text" name="position" value="{{ old('position') }}" required placeholder="e.g. Chief Executive Officer" class="w-full">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Short Bio</label>
                <textarea name="bio" rows="4" placeholder="A short, professional description of their role and experience">{{ old('bio') }}</textarea>
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold mb-2">Display Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full">
                </div>
                <div class="flex items-end">
                    <label class="flex items-center gap-2 text-sm font-semibold">
                        <input type="checkbox" name="is_active" value="1" checked>
                        Published (visible on website)
                    </label>
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="rounded-full bg-brand-orange text-white px-7 py-3 font-bold hover:bg-brand-dark transition">Save Profile</button>
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
