<?php

namespace App\Http\Controllers;

use App\Models\PricingPackage;
use Illuminate\View\View;

class PricingController extends Controller
{
    public function index(): View
    {
        $packages = PricingPackage::ordered()->get()->groupBy('category');

        return view('pricing', compact('packages'));
    }
}
