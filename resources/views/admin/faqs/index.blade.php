@extends('layouts.admin')

@section('title', 'Quick Answers')
@section('page_title', 'Quick Help / Quick Answers')

@section('content')

    <div class="flex items-center justify-between mb-5">
        <p class="text-sm text-gray-500 max-w-md">These power the "Quick Help" chat widget shown to every visitor across the site, so they can get instant answers before contacting you.</p>
        <a href="{{ route('admin.faqs.create') }}" class="inline-flex items-center gap-2 rounded-full bg-brand-orange text-white px-6 py-2.5 font-bold text-sm hover:bg-brand-dark transition flex-none">
            <x-icon name="plus" class="w-4 h-4" /> Add Answer
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-brand-dark text-white">
                <tr>
                    <th class="text-left px-6 py-3 font-semibold">Question</th>
                    <th class="text-left px-6 py-3 font-semibold hidden md:table-cell">Answer</th>
                    <th class="text-left px-6 py-3 font-semibold">Status</th>
                    <th class="text-right px-6 py-3 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($faqs as $faq)
                    <tr class="hover:bg-brand-cream/60">
                        <td class="px-6 py-4 font-semibold">{{ $faq->question }}</td>
                        <td class="px-6 py-4 text-gray-500 hidden md:table-cell">{{ \Illuminate\Support\Str::limit($faq->answer, 60) }}</td>
                        <td class="px-6 py-4">
                            @if ($faq->is_active)
                                <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full">Active</span>
                            @else
                                <span class="bg-gray-100 text-gray-500 text-xs font-bold px-3 py-1 rounded-full">Hidden</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="text-brand-orange font-semibold hover:underline">Edit</a>
                            <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="inline" onsubmit="return confirm('Delete this answer?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-semibold hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-10 text-center text-gray-400">No quick answers yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
