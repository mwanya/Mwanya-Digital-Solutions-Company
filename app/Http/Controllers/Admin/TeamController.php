<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index(): View
    {
        $members = TeamMember::orderBy('sort_order')->get();

        return view('admin.team.index', compact('members'));
    }

    public function create(): View
    {
        return view('admin.team.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateRequest($request);

        if ($request->hasFile('photo')) {
            $validated['photo'] = 'storage/'.$request->file('photo')->store('team', 'public');
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team.index')->with('success', 'Leadership profile added.');
    }

    public function edit(TeamMember $team): View
    {
        return view('admin.team.edit', ['member' => $team]);
    }

    public function update(Request $request, TeamMember $team): RedirectResponse
    {
        $validated = $this->validateRequest($request);

        if ($request->hasFile('photo')) {
            if ($team->photo && str_starts_with($team->photo, 'storage/')) {
                Storage::disk('public')->delete(substr($team->photo, strlen('storage/')));
            }
            $validated['photo'] = 'storage/'.$request->file('photo')->store('team', 'public');
        }

        $team->update($validated);

        return redirect()->route('admin.team.index')->with('success', 'Leadership profile updated.');
    }

    public function destroy(TeamMember $team): RedirectResponse
    {
        if ($team->photo && str_starts_with($team->photo, 'storage/')) {
            Storage::disk('public')->delete(substr($team->photo, strlen('storage/')));
        }

        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Leadership profile removed.');
    }

    /**
     * Removes just the uploaded photo, keeping the rest of the profile
     * (name, position, bio) intact — reverts the card to the placeholder
     * avatar until a new photo is uploaded.
     */
    public function destroyPhoto(TeamMember $team): RedirectResponse
    {
        if ($team->photo && str_starts_with($team->photo, 'storage/')) {
            Storage::disk('public')->delete(substr($team->photo, strlen('storage/')));
        }

        $team->update(['photo' => null]);

        return redirect()->route('admin.team.edit', $team)->with('success', 'Photo removed.');
    }

    private function validateRequest(Request $request): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'position' => ['required', 'string', 'max:150'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'sort_order' => ['nullable', 'integer'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:8192'],
        ]);

        unset($validated['photo']);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active', true);

        return $validated;
    }
}
