<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PricingController extends Controller
{
    public function index(): View
    {
        $packages = PricingPackage::orderBy('category')->orderBy('sort_order')->get();

        return view('admin.pricing.index', compact('packages'));
    }

    public function create(): View
    {
        return view('admin.pricing.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateRequest($request);

        PricingPackage::create($validated);

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing package added.');
    }

    public function edit(PricingPackage $pricing): View
    {
        return view('admin.pricing.edit', ['package' => $pricing]);
    }

    public function update(Request $request, PricingPackage $pricing): RedirectResponse
    {
        $validated = $this->validateRequest($request);

        $pricing->update($validated);

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing package updated.');
    }

    public function destroy(PricingPackage $pricing): RedirectResponse
    {
        $pricing->delete();

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing package removed.');
    }

    private function validateRequest(Request $request): array
    {
        $validated = $request->validate([
            'category' => ['required', 'string', 'max:150'],
            'package_name' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string', 'max:255'],
            'unit' => ['nullable', 'string', 'max:50'],
            'price' => ['required', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        return $validated;
    }
}
