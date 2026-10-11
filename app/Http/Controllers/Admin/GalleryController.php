<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $images = GalleryImage::orderByDesc('sort_order')->orderByDesc('id')->get();

        return view('admin.gallery.index', compact('images'));
    }

    public function create(): View
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:150'],
            'caption' => ['nullable', 'string', 'max:255'],
            'event_date' => ['nullable', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:8192'],
        ]);

        $path = $request->file('photo')->store('gallery', 'public');

        GalleryImage::create([
            'title' => $validated['title'] ?? null,
            'caption' => $validated['caption'] ?? null,
            'event_date' => $validated['event_date'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
            'image' => 'storage/'.$path,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Photo uploaded to the gallery.');
    }

    public function edit(GalleryImage $gallery): View
    {
        return view('admin.gallery.edit', ['photo' => $gallery]);
    }

    public function update(Request $request, GalleryImage $gallery): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:150'],
            'caption' => ['nullable', 'string', 'max:255'],
            'event_date' => ['nullable', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:8192'],
        ]);

        $data = [
            'title' => $validated['title'] ?? null,
            'caption' => $validated['caption'] ?? null,
            'event_date' => $validated['event_date'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ];

        if ($request->hasFile('photo')) {
            // Remove the old uploaded file (only if it lives in our own storage disk).
            if (str_starts_with($gallery->image, 'storage/')) {
                Storage::disk('public')->delete(substr($gallery->image, strlen('storage/')));
            }

            $path = $request->file('photo')->store('gallery', 'public');
            $data['image'] = 'storage/'.$path;
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Photo updated.');
    }

    public function destroy(GalleryImage $gallery): RedirectResponse
    {
        if (str_starts_with($gallery->image, 'storage/')) {
            Storage::disk('public')->delete(substr($gallery->image, strlen('storage/')));
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Photo removed from the gallery.');
    }
}
