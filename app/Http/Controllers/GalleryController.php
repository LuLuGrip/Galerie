<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;


class GalleryController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('gallery.index', compact('photos'));
    }


    public function showImage($id)
    {
        $image = Photo::findOrFail($id);
        return view('gallery.show', compact('image'));
    }
}
