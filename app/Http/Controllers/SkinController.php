<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skin;

class SkinController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display skins
        return view('skins.index');
    }

    public function create()
    {
        // Logic to show the form for creating a new skin
        return view('skins.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $path = $request->file('file')->store('public/skins');
        dd($data, $path);


    }
}
