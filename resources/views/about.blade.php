@extends('layouts.app')

@section('title', 'About Us')

@section('content')

    <section class="bg-brand-dark text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-brand-gold font-bold text-xs tracking-widest uppercase">About {{ setting('company.name', config('app.company.name')) }}</span>
            <h1 class="text-4xl font-extrabold mt-2">Who We Are</h1>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center mb-16 reveal">
                <img src="{{ asset('images/gallery-2.jpg') }}" alt="Heisen Group technician" class="lift-hover rounded-2xl shadow-lg w-full h-96 object-cover">
                <div>
                    <h2 class="text-2xl font-extrabold mb-4">Company Description</h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        HEISEN GROUP COMPANY LIMITED is a dynamic and fast-growing Tanzanian company offering professional cleaning, fumigation, pest control, and environmental management services to both residential and commercial clients.
                    </p>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Based in Dar es Salaam, we have been operating actively and reliably, with a strong commitment to quality and client satisfaction. Our experienced and certified technicians are strategically located to respond promptly to your needs, wherever you are within Tanzania.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        All our staff are trained and TPRI-certified, ensuring we meet the highest safety and environmental standards. We use modern tools, eco-friendly products, and integrated pest management techniques to eliminate the root causes of pest infestations and create clean, safe environments for both homes and workplaces.
                    </p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-16 reveal reveal-delay-2">
                <div class="tilt-card bg-brand-cream rounded-2xl p-8 border border-brand-orange/10">
                    <h3 class="text-xl font-extrabold mb-3 text-brand-orange flex items-center gap-2"><x-icon name="globe" class="w-5 h-5" /> Our Vision</h3>
                    <p class="text-gray-700 leading-relaxed">To become a global leader in delivering high-quality fumigation, cleaning and environmental management services to both public and private sectors.</p>
                </div>
                <div class="tilt-card bg-brand-cream rounded-2xl p-8 border border-brand-orange/10">
                    <h3 class="text-xl font-extrabold mb-3 text-brand-orange flex items-center gap-2"><x-icon name="target" class="w-5 h-5" /> Our Mission</h3>
                    <p class="text-gray-700 leading-relaxed">To make Tanzania safer and healthier by combating pest-related threats and offering exceptional cleaning services to homes, offices, industries, and public institutions. We are committed to making every place we serve hygienic, protected, and conducive for living or working.</p>
                </div>
            </div>

            <div class="reveal bg-brand-dark text-white rounded-2xl p-10 text-center">
                <h3 class="text-xl font-extrabold mb-3 text-brand-gold flex items-center justify-center gap-2"><x-icon name="shield-check" class="w-6 h-6" /> Registration &amp; Certification</h3>
                <p class="text-gray-300 max-w-2xl mx-auto leading-relaxed">
                    HEISEN GROUP COMPANY LIMITED is registered with the Tanzania Revenue Authority (TRA), the Occupational Safety and Health Authority (OSHA) and the Business Registrations and Licensing Agency (BRELA), and is licensed under the NEST system to operate in Tanzania.
                </p>
                <div class="flex justify-center gap-4 mt-6 flex-wrap">
                    <span class="bg-white/10 px-5 py-2 rounded-full text-sm font-bold">TRA Registered</span>
                    <span class="bg-white/10 px-5 py-2 rounded-full text-sm font-bold">OSHA Registered</span>
                    <span class="bg-white/10 px-5 py-2 rounded-full text-sm font-bold">BRELA Registered</span>
                    <span class="bg-white/10 px-5 py-2 rounded-full text-sm font-bold">NEST Licensed</span>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-brand-cream">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
            <h2 class="text-2xl font-extrabold mb-4">Want to work with us?</h2>
            <p class="text-gray-600 mb-8">Reach out today and let our certified team take care of your cleaning, fumigation or pest control needs.</p>
            <a href="{{ route('contact') }}" class="lift-hover inline-flex items-center gap-2 rounded-full bg-brand-orange text-white px-8 py-3.5 font-bold hover:bg-brand-dark transition shadow-lg">Contact Us <x-icon name="arrow-right" class="w-4 h-4" /></a>
        </div>
    </section>

@endsection
