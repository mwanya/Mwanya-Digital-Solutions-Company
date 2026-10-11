@extends('layouts.admin')

@section('title', 'Edit Service')
@section('page_title', 'Edit Service')

@section('content')

    <div class="bg-white rounded-2xl shadow-sm p-8 max-w-3xl">
        <form method="POST" action="{{ route('admin.services.update', $service) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid sm:grid-cols-3 gap-5">
                <div class="sm:col-span-2">
                    <label class="block text-sm font-semibold mb-2">Title</label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Icon</label>
                    @php($iconOptions = ['sparkles','home','factory','water-drop','archive-box','wrench','car','leaf','bug','spray','check-circle','star','shield-check','globe','target'])
                    @php($currentIcon = old('icon', $service->icon))
                    <select name="icon" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                        @foreach ($iconOptions as $option)
                            <option value="{{ $option }}" {{ $currentIcon === $option ? 'selected' : '' }}>{{ ucwords(str_replace('-', ' ', $option)) }}</option>
                        @endforeach
                    </select>
                    <div class="mt-3 inline-flex items-center justify-center h-12 w-12 rounded-xl bg-brand-orange/10 text-brand-orange">
                        <x-icon :name="$service->icon" class="w-6 h-6" />
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Short Description</label>
                <input type="text" name="short_description" value="{{ old('short_description', $service->short_description) }}" required maxlength="255" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Full Description</label>
                <textarea name="description" rows="6" required class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">{{ old('description', $service->description) }}</textarea>
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}" class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
                <div class="flex items-end">
                    <label class="flex items-center gap-2 text-sm font-semibold">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-brand-orange focus:ring-brand-orange">
                        Published (visible on website)
                    </label>
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="rounded-full bg-brand-orange text-white px-7 py-3 font-bold hover:bg-brand-dark transition">Update Service</button>
                <a href="{{ route('admin.services.index') }}" class="rounded-full border border-gray-300 px-7 py-3 font-bold hover:bg-gray-50 transition">Cancel</a>
            </div>
        </form>
    </div>

@endsection
