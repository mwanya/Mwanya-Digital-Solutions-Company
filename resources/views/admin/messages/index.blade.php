@extends('layouts.admin')

@section('title', 'Messages')
@section('page_title', 'Contact Messages')

@section('content')

    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-brand-dark text-white">
                <tr>
                    <th class="text-left px-6 py-3 font-semibold">From</th>
                    <th class="text-left px-6 py-3 font-semibold hidden md:table-cell">Subject</th>
                    <th class="text-left px-6 py-3 font-semibold hidden sm:table-cell">Received</th>
                    <th class="text-left px-6 py-3 font-semibold">Status</th>
                    <th class="text-right px-6 py-3 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($messages as $message)
                    <tr class="hover:bg-brand-cream/60">
                        <td class="px-6 py-4">
                            <p class="font-semibold">{{ $message->name }}</p>
                            <p class="text-gray-400 text-xs">{{ $message->email }}</p>
                        </td>
                        <td class="px-6 py-4 text-gray-600 hidden md:table-cell">{{ \Illuminate\Support\Str::limit($message->subject, 40) }}</td>
                        <td class="px-6 py-4 text-gray-400 hidden sm:table-cell">{{ $message->created_at->format('d M Y, H:i') }}</td>
                        <td class="px-6 py-4">
                            @if ($message->is_read)
                                <span class="bg-gray-100 text-gray-500 text-xs font-bold px-3 py-1 rounded-full">Read</span>
                            @else
                                <span class="bg-brand-orange text-white text-xs font-bold px-3 py-1 rounded-full">New</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <a href="{{ route('admin.messages.show', $message) }}" class="text-brand-orange font-semibold hover:underline">View</a>
                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline" onsubmit="return confirm('Delete this message?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-semibold hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-10 text-center text-gray-400">No messages received yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $messages->links() }}
    </div>

@endsection
