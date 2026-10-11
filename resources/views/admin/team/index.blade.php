@extends('layouts.admin')

@section('title', 'Leadership')
@section('page_title', 'Leadership / Team')

@section('content')

    <div class="flex items-center justify-between mb-5">
        <p class="text-sm text-gray-500 max-w-md">Profiles shown here appear on the public Leadership page in this order. Upload a photo and short bio for each leader.</p>
        <a href="{{ route('admin.team.create') }}" class="inline-flex items-center gap-2 rounded-full bg-brand-orange text-white px-6 py-2.5 font-bold text-sm hover:bg-brand-dark transition flex-none">
            <x-icon name="plus" class="w-4 h-4" /> Add Profile
        </a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse ($members as $member)
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <div class="h-48 bg-brand-dark/[0.04] flex items-center justify-center overflow-hidden">
                    @if ($member->photo_url)
                        <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" class="w-full h-full object-contain" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    @endif
                    <span class="h-20 w-20 rounded-full bg-brand-orange/10 text-brand-orange items-center justify-center {{ $member->photo_url ? 'hidden' : 'flex' }}">
                        <x-icon name="user-circle" class="w-10 h-10" />
                    </span>
                </div>
                <div class="p-4">
                    <p class="font-bold text-sm">{{ $member->name }}</p>
                    <p class="text-xs text-brand-orange font-semibold mt-0.5">{{ $member->position }}</p>
                    @unless ($member->is_active)
                        <span class="inline-block mt-2 bg-gray-100 text-gray-500 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">Hidden</span>
                    @endunless
                    <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-100">
                        <a href="{{ route('admin.team.edit', $member) }}" class="text-brand-orange font-semibold text-xs flex items-center gap-1 hover:underline">
                            <x-icon name="pencil" class="w-3.5 h-3.5" /> Edit
                        </a>
                        <form action="{{ route('admin.team.destroy', $member) }}" method="POST" onsubmit="return confirm('Remove this profile?');">
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
                <x-icon name="user-circle" class="w-10 h-10 mx-auto mb-3 text-gray-300" />
                No leadership profiles yet.
            </div>
        @endforelse
    </div>

@endsection
