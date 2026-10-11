@extends('layouts.app')

@section('title', 'Pricing')

@section('content')

    <section class="bg-brand-dark text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-brand-gold font-bold text-xs tracking-widest uppercase">Service costs</span>
            <h1 class="text-4xl font-extrabold mt-2">Pricing &amp; Packages</h1>
            <p class="text-gray-300 mt-4 max-w-2xl">Indicative pricing for our most requested services, in Tanzanian Shillings (Tsh). Large or complex jobs are quoted after a free site inspection.</p>
        </div>
    </section>

    <section class="py-16 bg-brand-cream">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            @forelse ($packages as $category => $items)
                <div class="reveal">
                    <h2 class="text-xl font-extrabold mb-5 text-brand-orange flex items-center gap-2"><x-icon name="tag" class="w-5 h-5" /> {{ $category }}</h2>
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-brand-dark text-white">
                                <tr>
                                    <th class="text-left px-6 py-3 font-semibold">Package</th>
                                    <th class="text-left px-6 py-3 font-semibold hidden sm:table-cell">Description</th>
                                    <th class="text-left px-6 py-3 font-semibold">Unit</th>
                                    <th class="text-right px-6 py-3 font-semibold">Price (Tsh)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($items as $item)
                                    <tr class="hover:bg-brand-cream/60">
                                        <td class="px-6 py-4 font-semibold">{{ $item->package_name }}</td>
                                        <td class="px-6 py-4 text-gray-500 hidden sm:table-cell">{{ $item->description }}</td>
                                        <td class="px-6 py-4 text-gray-500">{{ $item->unit }}</td>
                                        <td class="px-6 py-4 text-right font-bold text-brand-orange">{{ $item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center py-12">Pricing information is being updated. Please contact us directly for a quote.</p>
            @endforelse

            <div class="reveal bg-white rounded-2xl p-8 text-center shadow-sm border border-brand-orange/10">
                <h3 class="font-bold text-lg mb-2">Don't see what you need?</h3>
                <p class="text-gray-600 text-sm mb-5">Jobs such as garden fields, sewage unblocking and warehouse cleaning are quoted after a free site visit. Contact us for a tailored estimate.</p>
                <a href="{{ route('contact') }}" class="lift-hover inline-flex items-center gap-2 rounded-full bg-brand-orange text-white px-6 py-3 font-bold hover:bg-brand-dark transition shadow-md">Request a Custom Quote <x-icon name="arrow-right" class="w-4 h-4" /></a>
            </div>
        </div>
    </section>

@endsection
