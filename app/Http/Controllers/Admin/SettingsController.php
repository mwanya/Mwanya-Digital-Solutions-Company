<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function edit(): View
    {
        $settings = [
            'company.name' => setting('company.name'),
            'company.tagline' => setting('company.tagline'),
            'company.phone_primary' => setting('company.phone_primary'),
            'company.phone_secondary' => setting('company.phone_secondary'),
            'company.email' => setting('company.email'),
            'company.address' => setting('company.address'),
            'company.facebook' => setting('company.facebook'),
            'company.instagram' => setting('company.instagram'),
        ];

        return view('admin.settings.edit', compact('settings'));
    }

    public function updateGeneral(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'company_name' => ['required', 'string', 'max:150'],
            'company_tagline' => ['nullable', 'string', 'max:255'],
            'phone_primary' => ['required', 'string', 'max:30'],
            'phone_secondary' => ['nullable', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:150'],
            'address' => ['required', 'string', 'max:255'],
            'facebook' => ['nullable', 'string', 'max:100'],
            'instagram' => ['nullable', 'string', 'max:100'],
        ]);

        Setting::setMany([
            'company.name' => $validated['company_name'],
            'company.tagline' => $validated['company_tagline'] ?? '',
            'company.phone_primary' => $validated['phone_primary'],
            'company.phone_secondary' => $validated['phone_secondary'] ?? '',
            'company.email' => $validated['email'],
            'company.address' => $validated['address'],
            'company.facebook' => $validated['facebook'] ?? '',
            'company.instagram' => $validated['instagram'] ?? '',
        ]);

        return redirect()->route('admin.settings.edit')->with('success', 'Site settings updated successfully.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $user = Auth::user();
        $user->update(['password' => Hash::make($request->string('password'))]);

        return redirect()->route('admin.settings.edit')->with('success', 'Password changed successfully.');
    }
}
