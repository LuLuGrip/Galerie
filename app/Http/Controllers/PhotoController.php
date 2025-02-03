<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    // Zobrazení všech fotek
    public function index()
    {
        $photos = Photo::all(); // Načte všechny fotky z databáze
        return view('photos.index', compact('photos'));
    }

    // Uložení fotky
    public function store(Request $request)
    {
        // Validace vstupu
        $request->validate([
            'title' => 'required|string|max:255', // Přidáno
            'description' => 'nullable|string', // Přidáno
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Formáty a maximální velikost
        ]);

        // Uložení souboru
        $file = $request->file('photo');
        $path = $file->store('photos', 'public'); // Uložení do složky 'photos' na veřejný disk

        // Uložení informací do databáze
        $photo = Photo::create([
            'filename' => $file->getClientOriginalName(),
            'path' => $path,
            'title' => $request->title, // Přidáno
            'description' => $request->description, // Přidáno
        ]);

        // Přesměrování zpět s úspěšnou zprávou
        return back()->with('success', 'Fotka byla úspěšně nahrána.');
    }

    // Zobrazení konkrétní fotky
    public function show($id)
    {
        $photo = Photo::findOrFail($id); // Načte fotku podle ID
        return view('photos.show', compact('photo'));
    }

    public function showProfile()
    {
        // Předání aktuálně přihlášeného uživatele (pokud je autentifikován)
        $profile = Auth::user();

        // Předání proměnné do view
        return view('profile.show', compact('profile'));
    }
}