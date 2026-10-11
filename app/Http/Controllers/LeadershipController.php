<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\View\View;

class LeadershipController extends Controller
{
    public function index(): View
    {
        $members = TeamMember::ordered()->get();

        return view('leadership', compact('members'));
    }
}
