@extends('layouts.admin')

@section('title', 'Services')
@section('page_title', 'Manage Services')

@section('content')

    <div class="flex justify-end mb-5">
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center rounded-full bg-brand-orange text-white px-6 py-2.5 font-bold text-sm hover:bg-brand-dark transition">+ Add Service</a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-brand-dark text-white">
                <tr>
                    <th class="text-left px-6 py-3 font-semibold">#</th>
                    <th class="text-left px-6 py-3 font-semibold">Icon</th>
                    <th class="text-left px-6 py-3 font-semibold">Title</th>
                    <th class="text-left px-6 py-3 font-semibold hidden md:table-cell">Short Description</th>
                    <th class="text-left px-6 py-3 font-semibold">Status</th>
                    <th class="text-right px-6 py-3 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($services as $service)
                    <tr class="hover:bg-brand-cream/60">
                        <td class="px-6 py-4 text-gray-400">{{ $service->sort_order }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center justify-center h-9 w-9 rounded-lg bg-brand-orange/10 text-brand-orange">
                                <x-icon :name="$service->icon" class="w-5 h-5" />
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold">{{ $service->title }}</td>
                        <td class="px-6 py-4 text-gray-500 hidden md:table-cell">{{ \Illuminate\Support\Str::limit($service->short_description, 60) }}</td>
                        <td class="px-6 py-4">
                            @if ($service->is_active)
                                <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full">Active</span>
                            @else
                                <span class="bg-gray-100 text-gray-500 text-xs font-bold px-3 py-1 rounded-full">Hidden</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <a href="{{ route('admin.services.edit', $service) }}" class="text-brand-orange font-semibold hover:underline">Edit</a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Delete this service?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-semibold hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-10 text-center text-gray-400">No services yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
