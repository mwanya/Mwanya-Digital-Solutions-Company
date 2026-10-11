@extends('layouts.admin')

@section('title', 'Edit Pricing Package')
@section('page_title', 'Edit Pricing Package')

@section('content')

    <div class="bg-white rounded-2xl shadow-sm p-8 max-w-3xl">
        <form method="POST" action="{{ route('admin.pricing.update', $package) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold mb-2">Category</label>
                    <input type="text" name="category" value="{{ old('category', $package->category) }}" required class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Package Name</label>
                    <input type="text" name="package_name" value="{{ old('package_name', $package->package_name) }}" required class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Description</label>
                <input type="text" name="description" value="{{ old('description', $package->description) }}" maxlength="255" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
            </div>

            <div class="grid sm:grid-cols-3 gap-5">
                <div>
                    <label class="block text-sm font-semibold mb-2">Unit</label>
                    <input type="text" name="unit" value="{{ old('unit', $package->unit) }}" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Price (Tsh)</label>
                    <input type="text" name="price" value="{{ old('price', $package->price) }}" required class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $package->sort_order) }}" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
            </div>

            <label class="flex items-center gap-2 text-sm font-semibold">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $package->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-brand-orange focus:ring-brand-orange">
                Published (visible on pricing page)
            </label>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="rounded-full bg-brand-orange text-white px-7 py-3 font-bold hover:bg-brand-dark transition">Update Package</button>
                <a href="{{ route('admin.pricing.index') }}" class="rounded-full border border-gray-300 px-7 py-3 font-bold hover:bg-gray-50 transition">Cancel</a>
            </div>
        </form>
    </div>

@endsection
