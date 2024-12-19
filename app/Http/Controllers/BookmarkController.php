<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    // Retrieve all bookmarks for the authenticated user
    public function index()
    {
        $bookmarks = auth()->user()->bookmarks; // Get all bookmarks for the logged-in user
        return response()->json($bookmarks);
    }

    // Create a new bookmark
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $bookmark = auth()->user()->bookmarks()->create([
            'url' => $request->url,
        ]);

        return response()->json($bookmark, 201); // Return the created bookmark with a 201 status code
    }

    // Retrieve a single bookmark
    public function show($id)
    {
        $bookmark = auth()->user()->bookmarks()->findOrFail($id); // Check if the bookmark belongs to the user
        return response()->json($bookmark);
    }

    // Update an existing bookmark
    public function update(Request $request, $id)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $bookmark = auth()->user()->bookmarks()->findOrFail($id);
        $bookmark->update([
            'url' => $request->url,
        ]);

        return response()->json($bookmark);
    }

    // Delete a bookmark
    public function destroy($id)
    {
        $bookmark = auth()->user()->bookmarks()->findOrFail($id);
        $bookmark->delete();

        return response()->json(['message' => 'Bookmark deleted successfully']);
    }
}
