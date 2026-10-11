<footer class="bg-brand-dark text-white mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 grid grid-cols-1 md:grid-cols-4 gap-10">

        <div>
            <div class="flex items-center gap-3 mb-4">
                <img src="{{ asset('images/logo.jpg') }}" alt="Heisen Group logo" class="h-12 w-12 rounded-full object-cover ring-2 ring-brand-gold">
                <span class="font-extrabold leading-tight">{{ setting('company.name', config('app.company.name')) }}</span>
            </div>
            <p class="text-sm text-gray-300 leading-relaxed">
                A dynamic, fast-growing Tanzanian company offering professional cleaning, fumigation, pest control and environmental management services across Tanzania.
            </p>
        </div>

        <div>
            <h4 class="font-bold text-brand-gold mb-4 uppercase text-xs tracking-widest">Quick Links</h4>
            <ul class="space-y-2 text-sm text-gray-300">
                <li><a href="{{ route('about') }}" class="hover:text-white">About Us</a></li>
                <li><a href="{{ route('services.index') }}" class="hover:text-white">Our Services</a></li>
                <li><a href="{{ route('pricing') }}" class="hover:text-white">Pricing</a></li>
                <li><a href="{{ route('gallery') }}" class="hover:text-white">Gallery</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-white">Contact Us</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-bold text-brand-gold mb-4 uppercase text-xs tracking-widest">Our Services</h4>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>General &amp; Industrial Cleaning</li>
                <li>Pest Control &amp; Fumigation</li>
                <li>Water Bodies Cleaning</li>
                <li>Warehouse &amp; Parking Lot Cleaning</li>
                <li>Farm Cleaning &amp; Maintenance</li>
            </ul>
        </div>

        <div>
            <h4 class="font-bold text-brand-gold mb-4 uppercase text-xs tracking-widest">Contact</h4>
            <ul class="space-y-3 text-sm text-gray-300">
                <li class="flex gap-3"><x-icon name="map-pin" class="w-5 h-5 flex-none text-brand-gold" /><span>{{ setting('company.address', config('app.company.address')) }}</span></li>
                <li class="flex gap-3"><x-icon name="phone" class="w-5 h-5 flex-none text-brand-gold" /><span>{{ setting('company.phone_primary', config('app.company.phone_primary')) }}@if(setting('company.phone_secondary')) / {{ setting('company.phone_secondary') }}@endif</span></li>
                <li class="flex gap-3"><x-icon name="mail" class="w-5 h-5 flex-none text-brand-gold" /><a href="mailto:{{ setting('company.email', config('app.company.email')) }}" class="hover:text-white">{{ setting('company.email', config('app.company.email')) }}</a></li>
                <li class="flex gap-3"><x-icon name="facebook" class="w-5 h-5 flex-none text-brand-gold" /><span>Facebook: {{ setting('company.facebook', config('app.company.facebook')) }}</span></li>
                <li class="flex gap-3"><x-icon name="instagram" class="w-5 h-5 flex-none text-brand-gold" /><span>Instagram: {{ setting('company.instagram', config('app.company.instagram')) }}</span></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row justify-between items-center gap-2 text-xs text-gray-400">
            <p>&copy; {{ date('Y') }} HEISEN GROUP COMPANY LIMITED. All rights reserved.</p>
            <p>Registered with TRA, OSHA &amp; BRELA &middot; Licensed under the NEST system to operate in Tanzania</p>
        </div>
    </div>
</footer>
