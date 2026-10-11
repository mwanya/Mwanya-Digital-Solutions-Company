@extends('layouts.admin')

@section('title', 'Settings')
@section('page_title', 'Site Settings')

@section('content')

    <div class="grid lg:grid-cols-2 gap-6">

        <div class="bg-white rounded-2xl shadow-sm p-8">
            <h3 class="font-bold text-lg mb-1 flex items-center gap-2"><x-icon name="cog" class="w-5 h-5 text-brand-orange" /> Company Information</h3>
            <p class="text-sm text-gray-500 mb-6">Shown across the website: navbar, footer, contact page and more. Changes apply immediately — no redeploy needed.</p>

            <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold mb-2">Company Name</label>
                    <input type="text" name="company_name" value="{{ old('company_name', $settings['company.name']) }}" required class="w-full">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">Tagline</label>
                    <input type="text" name="company_tagline" value="{{ old('company_tagline', $settings['company.tagline']) }}" class="w-full">
                </div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold mb-2">Primary Phone</label>
                        <input type="text" name="phone_primary" value="{{ old('phone_primary', $settings['company.phone_primary']) }}" required class="w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">Secondary Phone (optional)</label>
                        <input type="text" name="phone_secondary" value="{{ old('phone_secondary', $settings['company.phone_secondary']) }}" class="w-full">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', $settings['company.email']) }}" required class="w-full">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">Address</label>
                    <textarea name="address" rows="2" required>{{ old('address', $settings['company.address']) }}</textarea>
                </div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold mb-2">Facebook Handle</label>
                        <input type="text" name="facebook" value="{{ old('facebook', $settings['company.facebook']) }}" class="w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">Instagram Handle</label>
                        <input type="text" name="instagram" value="{{ old('instagram', $settings['company.instagram']) }}" class="w-full">
                    </div>
                </div>

                <button type="submit" class="rounded-full bg-brand-orange text-white px-7 py-3 font-bold hover:bg-brand-dark transition">Save Changes</button>
            </form>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-8 h-fit">
            <h3 class="font-bold text-lg mb-1 flex items-center gap-2"><x-icon name="key" class="w-5 h-5 text-brand-orange" /> Change Password</h3>
            <p class="text-sm text-gray-500 mb-6">Update your admin login password. You'll stay signed in after changing it.</p>

            <form method="POST" action="{{ route('admin.settings.password') }}" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold mb-2">Current Password</label>
                    <input type="password" name="current_password" required class="w-full">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">New Password</label>
                    <input type="password" name="password" required class="w-full">
                    <p class="text-xs text-gray-400 mt-1">At least 8 characters.</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Confirm New Password</label>
                    <input type="password" name="password_confirmation" required class="w-full">
                </div>

                <button type="submit" class="rounded-full bg-brand-dark text-white px-7 py-3 font-bold hover:bg-brand-orange transition">Update Password</button>
            </form>
        </div>

    </div>

@endsection
