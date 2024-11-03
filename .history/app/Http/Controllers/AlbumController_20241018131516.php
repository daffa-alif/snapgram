<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album; // Import the Album model
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch albums created by the authenticated user
        $albums = Album::where('userID', Auth::id())->get();
        return view('albums.create', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $albums = Album::where('userID', auth()->id())->get(); // Get albums for the authenticated user
    return view('photos.create', compact('albums')); // Pass the variable to the view
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'namaAlbum' => 'required|max:255',
            'deskripsi' => 'required|max:150',
        ]);

        // Create a new album associated with the authenticated user
        Album::create([
            'namaAlbum' => $request->input('namaAlbum'),
            'deskripsi' => $request->input('deskripsi'),
            'tanggalDibuat' => now(),
            'userID' => Auth::id(),
        ]);

        // Redirect back to the album list with a success message
        return redirect()->route('albums.index')->with('success', 'Album created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the album by ID and ensure it belongs to the current user
        $album = Album::where('userID', Auth::id())->findOrFail($id);
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the album by ID and ensure it belongs to the current user
        $album = Album::where('userID', Auth::id())->findOrFail($id);
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the updated album data
        $request->validate([
            'namaAlbum' => 'required|max:255',
            'deskripsi' => 'required|max:150',
        ]);

        // Find the album and ensure it belongs to the current user
        $album = Album::where('userID', Auth::id())->findOrFail($id);

        // Update the album with new data
        $album->update([
            'namaAlbum' => $request->input('namaAlbum'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        // Redirect back to the album list with a success message
        return redirect()->route('albums.index')->with('success', 'Album updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the album and ensure it belongs to the current user
        $album = Album::where('userID', Auth::id())->findOrFail($id);

        // Delete the album
        $album->delete();

        // Redirect back to the album list with a success message
        return redirect()->route('albums.index')->with('success', 'Album deleted successfully.');
    }
}
