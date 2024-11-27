<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class TablesController extends Controller
{
    public function about_table()
    {
        $aboutEntries = About::all();
        return view('components.content.about_table', compact('aboutEntries'));
    }

    public function edit_about($id)
{
    $entry = About::findOrFail($id);
    return view('about.edit', compact('entry'));
}

public function delete_about($id)
{
    $entry = About::findOrFail($id);
    $entry->delete();
    return redirect()->route('about_table')->with('success', 'Entry deleted successfully');
}

public function add_about(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
        ]);

        About::create($request->all());

        return redirect()->route('about_table')->with('success', 'Record added successfully.');
    }
}

