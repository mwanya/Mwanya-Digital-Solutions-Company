@extends('layouts.admin')

@section('title', 'Add Pricing Package')
@section('page_title', 'Add Pricing Package')

@section('content')

    <div class="bg-white rounded-2xl shadow-sm p-8 max-w-3xl">
        <form method="POST" action="{{ route('admin.pricing.store') }}" class="space-y-5">
            @csrf

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold mb-2">Category</label>
                    <input type="text" name="category" value="{{ old('category') }}" required placeholder="e.g. House Cleaning" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Package Name</label>
                    <input type="text" name="package_name" value="{{ old('package_name') }}" required class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Description</label>
                <input type="text" name="description" value="{{ old('description') }}" maxlength="255" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
            </div>

            <div class="grid sm:grid-cols-3 gap-5">
                <div>
                    <label class="block text-sm font-semibold mb-2">Unit</label>
                    <input type="text" name="unit" value="{{ old('unit') }}" placeholder="per day / per item" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Price (Tsh)</label>
                    <input type="text" name="price" value="{{ old('price') }}" required placeholder="40,000/=" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
            </div>

            <label class="flex items-center gap-2 text-sm font-semibold">
                <input type="checkbox" name="is_active" value="1" checked class="rounded border-gray-300 text-brand-orange focus:ring-brand-orange">
                Published (visible on pricing page)
            </label>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="rounded-full bg-brand-orange text-white px-7 py-3 font-bold hover:bg-brand-dark transition">Save Package</button>
                <a href="{{ route('admin.pricing.index') }}" class="rounded-full border border-gray-300 px-7 py-3 font-bold hover:bg-gray-50 transition">Cancel</a>
            </div>
        </form>
    </div>

@endsection
