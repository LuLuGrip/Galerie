<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('photos.index', compact('photos'));
    }

    public function create()
    {
        return view('photos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('photo')->store('photos', 'public');

        Photo::create([
            'title' => $request->title,
            'description' => $request->description,
            'path' => $path,
        ]);

        return redirect()->route('photos.index')->with('success', 'Photo uploaded successfully!');
    }

    public function show($id)
    {
        $photo = Photo::findOrFail($id);
        return view('photos.show', compact('photo'));
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        Storage::disk('public')->delete($photo->path);
        $photo->delete();

        return redirect()->route('photos.index')->with('success', 'Photo deleted successfully!');
    }
}
