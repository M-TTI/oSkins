<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skin;

class SkinController extends Controller
{
    public function index()
    {
        $skins = Skin::all();
        return view('skins.index', compact('skins'));
    }

    public function show($id)
    {
        $skin = Skin::findOrFail($id);
        return view('skins.show', compact('skin'));
    }

    public function create()
    {
        return view('skins.create');
    }

    public function store(Request $request)
    {
//        if (!$request->hasFile('file')) {
//            dd(
//                'No file in request',
//                $request->allFiles(),    // Show all uploaded files
//                $_FILES,                // Raw PHP file array
//                ini_get('upload_max_filesize'),
//                ini_get('post_max_size')
//            );
//        }
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'file' => 'required|file|mimes:osk,zip|max:102400', // 100MB max
        ]);

        $path = $request->file('file')->store('public/skins');

        $newSkin = Skin::create([
            'name' => $data['name'],
            'author' => $data['author'],
            'path_to_file' => $path,
        ]);

        return redirect()->route('skin.index')->with('success', 'Skin uploaded successfully!');
    }

    public function edit($id)
    {
        $skin = Skin::findOrFail($id);
        return view('skins.edit', compact('skin'));
    }

    public function update(Request $request, int $id)
    {
        $skin = Skin::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:osk,zip|max:102400', // 100MB max
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('public/skins');
            $data['path_to_file'] = $path;
        }

        $skin->update($data);

        return redirect()->route('skin.show', $skin->id)->with('success', 'Skin updated successfully!');
    }
}
