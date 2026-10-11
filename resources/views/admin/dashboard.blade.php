@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5 mb-8">
        <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition reveal">
            <div class="h-10 w-10 rounded-lg bg-brand-orange/10 text-brand-orange flex items-center justify-center mb-3"><x-icon name="sparkles" class="w-5 h-5" /></div>
            <p class="text-xs text-gray-400 font-semibold uppercase">Total Services</p>
            <p class="text-3xl font-extrabold mt-1">{{ $stats['services'] }}</p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition reveal">
            <div class="h-10 w-10 rounded-lg bg-green-100 text-green-600 flex items-center justify-center mb-3"><x-icon name="check-circle" class="w-5 h-5" /></div>
            <p class="text-xs text-gray-400 font-semibold uppercase">Active Services</p>
            <p class="text-3xl font-extrabold mt-1 text-green-600">{{ $stats['active_services'] }}</p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition reveal">
            <div class="h-10 w-10 rounded-lg bg-brand-orange/10 text-brand-orange flex items-center justify-center mb-3"><x-icon name="tag" class="w-5 h-5" /></div>
            <p class="text-xs text-gray-400 font-semibold uppercase">Pricing Packages</p>
            <p class="text-3xl font-extrabold mt-1">{{ $stats['pricing_packages'] }}</p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition reveal">
            <div class="h-10 w-10 rounded-lg bg-brand-orange/10 text-brand-orange flex items-center justify-center mb-3"><x-icon name="photo" class="w-5 h-5" /></div>
            <p class="text-xs text-gray-400 font-semibold uppercase">Gallery Photos</p>
            <p class="text-3xl font-extrabold mt-1">{{ $stats['gallery_photos'] }}</p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition reveal">
            <div class="h-10 w-10 rounded-lg bg-brand-orange/10 text-brand-orange flex items-center justify-center mb-3"><x-icon name="envelope-open" class="w-5 h-5" /></div>
            <p class="text-xs text-gray-400 font-semibold uppercase">Total Messages</p>
            <p class="text-3xl font-extrabold mt-1">{{ $stats['messages'] }}</p>
        </div>
        <div class="bg-brand-orange rounded-2xl p-6 shadow-sm text-white hover:shadow-lg transition reveal">
            <div class="h-10 w-10 rounded-lg bg-white/15 flex items-center justify-center mb-3"><x-icon name="mail" class="w-5 h-5" /></div>
            <p class="text-xs font-semibold uppercase opacity-80">Unread Messages</p>
            <p class="text-3xl font-extrabold mt-1">{{ $stats['unread_messages'] }}</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm">
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
            <h3 class="font-bold">Latest Messages</h3>
            <a href="{{ route('admin.messages.index') }}" class="text-sm font-semibold text-brand-orange hover:underline">View all</a>
        </div>
        <div class="divide-y divide-gray-100">
            @forelse ($latestMessages as $message)
                <a href="{{ route('admin.messages.show', $message) }}" class="flex items-center justify-between px-6 py-4 hover:bg-brand-cream transition">
                    <div class="min-w-0">
                        <p class="font-semibold text-sm truncate">{{ $message->name }} &middot; <span class="text-gray-500 font-normal">{{ $message->subject }}</span></p>
                        <p class="text-xs text-gray-400 mt-1">{{ $message->created_at->diffForHumans() }}</p>
                    </div>
                    @unless ($message->is_read)
                        <span class="flex-none bg-brand-orange text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">New</span>
                    @endunless
                </a>
            @empty
                <p class="px-6 py-10 text-center text-gray-400 text-sm">No messages received yet.</p>
            @endforelse
        </div>
    </div>

@endsection
