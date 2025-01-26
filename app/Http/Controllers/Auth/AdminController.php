<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (!session()->has('authenticated') || !session()->has('authenticated_expiration') || now()->greaterThan(session('authenticated_expiration'))) {
            session()->forget(['authenticated', 'authenticated_expiration']);
        }

        return view('admin.index');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $correctPassword = 'baltaci'; // Change this to the real password

        if ($request->password === $correctPassword) {
            session(['authenticated' => true]);
            session(['authenticated_expiration' => now()->addMinutes(5)]);
            return redirect()->route('admin.index');
        }

        return redirect()->route('admin.index')->withErrors(['password' => 'Invalid password!']);
    }
}
