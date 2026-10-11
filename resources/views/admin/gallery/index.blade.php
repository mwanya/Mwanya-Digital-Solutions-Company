@extends('layouts.admin')

@section('title', 'Gallery')
@section('page_title', 'Gallery / Activities')

@section('content')

    <div class="flex items-center justify-between mb-5">
        <p class="text-sm text-gray-500 max-w-md">Photos uploaded here appear automatically on the public Gallery page, showcasing real activities and events for clients.</p>
        <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center gap-2 rounded-full bg-brand-orange text-white px-6 py-2.5 font-bold text-sm hover:bg-brand-dark transition flex-none">
            <x-icon name="upload" class="w-4 h-4" /> Upload Photo
        </a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
        @forelse ($images as $photo)
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden group">
                <div class="relative h-44 bg-brand-dark/[0.04] flex items-center justify-center overflow-hidden">
                    <img src="{{ $photo->image_url }}" alt="{{ $photo->title ?? $photo->caption }}" class="max-w-full max-h-full w-full h-full object-contain group-hover:scale-105 transition duration-300">
                    @unless ($photo->is_active)
                        <span class="absolute top-2 left-2 bg-gray-900/80 text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">Hidden</span>
                    @endunless
                </div>
                <div class="p-4">
                    <p class="font-bold text-sm truncate">{{ $photo->title ?: 'Untitled' }}</p>
                    <p class="text-xs text-gray-500 mt-1 line-clamp-2">{{ $photo->caption }}</p>
                    @if ($photo->event_date)
                        <p class="text-[11px] text-gray-400 mt-2 flex items-center gap-1"><x-icon name="clock" class="w-3.5 h-3.5" /> {{ $photo->event_date }}</p>
                    @endif
                    <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-100">
                        <a href="{{ route('admin.gallery.edit', $photo) }}" class="text-brand-orange font-semibold text-xs flex items-center gap-1 hover:underline">
                            <x-icon name="pencil" class="w-3.5 h-3.5" /> Edit
                        </a>
                        <form action="{{ route('admin.gallery.destroy', $photo) }}" method="POST" onsubmit="return confirm('Delete this photo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 font-semibold text-xs flex items-center gap-1 hover:underline">
                                <x-icon name="trash" class="w-3.5 h-3.5" /> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-2xl p-12 text-center text-gray-400">
                <x-icon name="photo" class="w-10 h-10 mx-auto mb-3 text-gray-300" />
                No photos uploaded yet. Click "Upload Photo" to add your first activity picture.
            </div>
        @endforelse
    </div>

@endsection
