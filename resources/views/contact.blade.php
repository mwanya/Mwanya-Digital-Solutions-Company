@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

    <section class="relative bg-brand-dark text-white py-16 overflow-hidden">
        <div class="absolute -top-10 -left-10 h-72 w-72 rounded-full bg-brand-orange/20 blur-3xl blob-float-1"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-brand-gold font-bold text-xs tracking-widest uppercase">Get in touch</span>
            <h1 class="text-4xl font-extrabold mt-2">Contact Us</h1>
            <p class="text-gray-300 mt-4 max-w-2xl">Have a question or need a quote? Send us a message and our team will respond as soon as possible.</p>
        </div>
    </section>

    <section class="py-16 bg-brand-cream">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-5 gap-10">

            <div class="lg:col-span-2 space-y-6 reveal">
                <div class="tilt-card bg-white rounded-2xl p-7 shadow-sm flex gap-4">
                    <span class="flex-none h-11 w-11 rounded-xl bg-brand-orange/10 text-brand-orange flex items-center justify-center"><x-icon name="map-pin" class="w-5 h-5" /></span>
                    <div>
                        <h3 class="font-bold text-sm uppercase tracking-widest text-brand-orange mb-2">Address</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">{{ setting('company.address', config('app.company.address')) }}</p>
                    </div>
                </div>
                <div class="tilt-card bg-white rounded-2xl p-7 shadow-sm flex gap-4">
                    <span class="flex-none h-11 w-11 rounded-xl bg-brand-orange/10 text-brand-orange flex items-center justify-center"><x-icon name="phone" class="w-5 h-5" /></span>
                    <div>
                        <h3 class="font-bold text-sm uppercase tracking-widest text-brand-orange mb-2">Phone</h3>
                        <p class="text-gray-700 text-sm">{{ setting('company.phone_primary', config('app.company.phone_primary')) }}</p>
                        @if (setting('company.phone_secondary'))
                            <p class="text-gray-700 text-sm">{{ setting('company.phone_secondary') }}</p>
                        @endif
                    </div>
                </div>
                <div class="tilt-card bg-white rounded-2xl p-7 shadow-sm flex gap-4">
                    <span class="flex-none h-11 w-11 rounded-xl bg-brand-orange/10 text-brand-orange flex items-center justify-center"><x-icon name="mail" class="w-5 h-5" /></span>
                    <div>
                        <h3 class="font-bold text-sm uppercase tracking-widest text-brand-orange mb-2">Email</h3>
                        <a href="mailto:{{ setting('company.email', config('app.company.email')) }}" class="text-gray-700 text-sm hover:text-brand-orange">{{ setting('company.email', config('app.company.email')) }}</a>
                    </div>
                </div>
                <div class="tilt-card bg-white rounded-2xl p-7 shadow-sm">
                    <h3 class="font-bold text-sm uppercase tracking-widest text-brand-orange mb-4">Social Media</h3>
                    <div class="flex items-center gap-3 text-sm text-gray-700">
                        <span class="flex items-center gap-2"><x-icon name="facebook" class="w-5 h-5 text-brand-orange" /> {{ setting('company.facebook', config('app.company.facebook')) }}</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm text-gray-700 mt-2">
                        <span class="flex items-center gap-2"><x-icon name="instagram" class="w-5 h-5 text-brand-orange" /> {{ setting('company.instagram', config('app.company.instagram')) }}</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3 reveal reveal-delay-2">
                <div class="bg-white rounded-2xl p-8 shadow-sm">
                    <h3 class="font-bold text-xl mb-6">Send us a message</h3>

                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3 mb-6 text-sm">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                        @csrf

                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold mb-2" for="name">Full Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2" for="email">Email Address</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange transition">
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold mb-2" for="phone">Phone Number</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                    class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2" for="subject">Subject</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
                                    class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-2" for="message">Message</label>
                            <textarea name="message" id="message" rows="5" required
                                class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange transition">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="lift-hover inline-flex items-center gap-2 rounded-full bg-brand-orange text-white px-8 py-3.5 font-bold hover:bg-brand-dark transition shadow-lg">
                            Send Message <x-icon name="arrow-right" class="w-4 h-4" />
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
