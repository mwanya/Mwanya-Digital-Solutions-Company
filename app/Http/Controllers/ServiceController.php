<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::ordered()->get();

        return view('services.index', compact('services'));
    }

    public function show(Service $service): View
    {
        abort_unless($service->is_active, 404);

        $related = Service::ordered()
            ->where('id', '!=', $service->id)
            ->take(3)
            ->get();

        return view('services.show', compact('service', 'related'));
    }
}
