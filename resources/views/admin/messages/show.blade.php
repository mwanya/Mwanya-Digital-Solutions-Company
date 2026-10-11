@extends('layouts.admin')

@section('title', 'Message Detail')
@section('page_title', 'Message Detail')

@section('content')

    <a href="{{ route('admin.messages.index') }}" class="text-sm font-semibold text-brand-orange hover:underline">&larr; Back to messages</a>

    <div class="bg-white rounded-2xl shadow-sm p-8 max-w-3xl mt-5">
        <div class="flex items-start justify-between mb-6">
            <div>
                <h2 class="text-xl font-extrabold">{{ $message->subject }}</h2>
                <p class="text-gray-400 text-sm mt-1">{{ $message->created_at->format('d M Y, H:i') }}</p>
            </div>
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 font-semibold text-sm hover:underline">Delete</button>
            </form>
        </div>

        <dl class="grid sm:grid-cols-2 gap-5 mb-6 text-sm">
            <div>
                <dt class="text-gray-400 font-semibold uppercase text-xs">Name</dt>
                <dd class="mt-1 font-semibold">{{ $message->name }}</dd>
            </div>
            <div>
                <dt class="text-gray-400 font-semibold uppercase text-xs">Email</dt>
                <dd class="mt-1"><a href="mailto:{{ $message->email }}" class="text-brand-orange hover:underline">{{ $message->email }}</a></dd>
            </div>
            <div>
                <dt class="text-gray-400 font-semibold uppercase text-xs">Phone</dt>
                <dd class="mt-1">{{ $message->phone ?: '—' }}</dd>
            </div>
        </dl>

        <div>
            <dt class="text-gray-400 font-semibold uppercase text-xs mb-2">Message</dt>
            <dd class="bg-brand-cream rounded-xl p-5 leading-relaxed text-gray-700 whitespace-pre-line">{{ $message->message }}</dd>
        </div>

        <div class="mt-8">
            <a href="mailto:{{ $message->email }}?subject=RE: {{ $message->subject }}" class="inline-flex items-center rounded-full bg-brand-orange text-white px-6 py-3 font-bold hover:bg-brand-dark transition">Reply by Email</a>
        </div>
    </div>

@endsection
