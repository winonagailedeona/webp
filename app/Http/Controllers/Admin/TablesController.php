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
        $aboutEntries = About::findOrFail($id);  // Fetch the About aboutEntries
        return view('components.content.edit_about', compact('aboutEntries'));
    }

        // Handle the update of an About entry
        public function update_about(Request $request, $id)
        {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'content' => 'required|string',
            ]);
    
            $aboutEntries = About::findOrFail($id);
            $aboutEntries->update($validated);  // Update the About aboutEntries
    
            return redirect()->route('about_table')->with('success', 'About section updated successfully!');
        }
    
public function delete_about($id)
{
    $entry = About::findOrFail($id);
    $entry->delete();
    return redirect()->route('about_table')->with('success', 'Entry deleted successfully');
}
public function add_about(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'content' => 'required|string',
    ]);

    // Create a new About entry
    About::create($validated);

    // Redirect with a success message
    return redirect()->back()->with('success', 'New record added successfully!');
}


}

