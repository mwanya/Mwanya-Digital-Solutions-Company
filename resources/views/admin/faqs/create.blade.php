@extends('layouts.admin')

@section('title', 'Add Quick Answer')
@section('page_title', 'Add Quick Answer')

@section('content')

    <div class="bg-white rounded-2xl shadow-sm p-8 max-w-2xl">
        <form method="POST" action="{{ route('admin.faqs.store') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-semibold mb-2">Question</label>
                <input type="text" name="question" value="{{ old('question') }}" required placeholder="e.g. How do I book a service?" class="w-full">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Answer</label>
                <textarea name="answer" rows="5" required placeholder="Write a clear, friendly answer a customer can act on immediately">{{ old('answer') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Keywords (optional)</label>
                <input type="text" name="keywords" value="{{ old('keywords') }}" placeholder="words customers might type, space separated" class="w-full">
                <p class="text-xs text-gray-400 mt-1">Helps the Quick Help search match more phrasings of the same question.</p>
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold mb-2">Display Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full">
                </div>
                <div class="flex items-end">
                    <label class="flex items-center gap-2 text-sm font-semibold">
                        <input type="checkbox" name="is_active" value="1" checked>
                        Published (visible in Quick Help widget)
                    </label>
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="rounded-full bg-brand-orange text-white px-7 py-3 font-bold hover:bg-brand-dark transition">Save Answer</button>
                <a href="{{ route('admin.faqs.index') }}" class="rounded-full border border-gray-300 px-7 py-3 font-bold hover:bg-gray-50 transition">Cancel</a>
            </div>
        </form>
    </div>

@endsection
