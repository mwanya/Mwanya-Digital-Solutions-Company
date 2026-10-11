<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $services = Service::ordered()->take(6)->get();

        return view('home', compact('services'));
    }
}
