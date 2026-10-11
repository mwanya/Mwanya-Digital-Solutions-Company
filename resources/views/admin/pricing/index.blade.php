@extends('layouts.admin')

@section('title', 'Pricing')
@section('page_title', 'Manage Pricing Packages')

@section('content')

    <div class="flex justify-end mb-5">
        <a href="{{ route('admin.pricing.create') }}" class="inline-flex items-center rounded-full bg-brand-orange text-white px-6 py-2.5 font-bold text-sm hover:bg-brand-dark transition">+ Add Package</a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-brand-dark text-white">
                <tr>
                    <th class="text-left px-6 py-3 font-semibold">Category</th>
                    <th class="text-left px-6 py-3 font-semibold">Package</th>
                    <th class="text-left px-6 py-3 font-semibold hidden md:table-cell">Unit</th>
                    <th class="text-left px-6 py-3 font-semibold">Price</th>
                    <th class="text-left px-6 py-3 font-semibold">Status</th>
                    <th class="text-right px-6 py-3 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($packages as $package)
                    <tr class="hover:bg-brand-cream/60">
                        <td class="px-6 py-4 text-gray-500">{{ $package->category }}</td>
                        <td class="px-6 py-4 font-semibold">{{ $package->package_name }}</td>
                        <td class="px-6 py-4 text-gray-500 hidden md:table-cell">{{ $package->unit }}</td>
                        <td class="px-6 py-4 font-bold text-brand-orange">{{ $package->price }}</td>
                        <td class="px-6 py-4">
                            @if ($package->is_active)
                                <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full">Active</span>
                            @else
                                <span class="bg-gray-100 text-gray-500 text-xs font-bold px-3 py-1 rounded-full">Hidden</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <a href="{{ route('admin.pricing.edit', $package) }}" class="text-brand-orange font-semibold hover:underline">Edit</a>
                            <form action="{{ route('admin.pricing.destroy', $package) }}" method="POST" class="inline" onsubmit="return confirm('Delete this package?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-semibold hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-10 text-center text-gray-400">No pricing packages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
