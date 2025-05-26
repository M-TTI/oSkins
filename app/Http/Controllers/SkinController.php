<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skin;
use Illuminate\Support\Facades\Storage;


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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'file' => 'required|file|mimes:osk,zip|max:102400', // 100MB max
        ]);

        $path = $request->file('file')->store('skins','public');

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

            $path = $request->file('file')->store('skins','public');

            if ($skin->path_to_file) {
                Storage::disk('public')->delete($skin->path_to_file);
            }
            $data['path_to_file'] = $path;
        }

        $skin->update($data);

        return redirect()->route('skin.show', $skin->id)->with('success', 'Skin updated successfully!');
    }

    public function destroy($id)
    {
        $skin = Skin::findOrFail($id);

        if ($skin->path_to_file) {
            Storage::disk('public')->delete($skin->path_to_file);
        }

        $skin->delete();

        return redirect()->route('skin.index')->with('success', 'Skin deleted successfully!');
    }

    public function download($id)
    {
        $skin = Skin::findOrFail($id);

        if (!$skin->path_to_file) {
            return redirect()->back()->with('error', 'File not found.');
        }

        $filePath = storage_path('app/public/' . $skin->path_to_file);
        $fileName = $skin->name . '.osk';

        return response()->download($filePath, $fileName);
    }
}
