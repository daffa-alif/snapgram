<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Show the form for creating a new photo.
     */
    public function create()
    {
        // Get albums for the authenticated user
        $albums = Album::where('userID', Auth::id())->get();
        return view('photos.create', compact('albums')); // Pass the albums to the view
    }

    /**
     * Store a newly uploaded photo in storage.
     */
    public function store(Request $request)
    {
        // Validate the photo upload form input
        $request->validate([
            'judulFoto' => 'required|max:255',
            'deskripsiFoto' => 'required|max:500',
            'albumID' => 'required|exists:albums,albumID',
            'photo' => 'required|image|max:2048', // Ensure the field name matches the form input
        ]);

        // Handle file upload
        $path = $request->file('photo')->store('photos', 'public');

        // Create a new photo entry in the database
        Photo::create([
            'judulFoto' => $request->input('judulFoto'),
            'deskripsiFoto' => $request->input('deskripsiFoto'),
            'tanggalUnggah' => now(),
            'lokasiFile' => $path,
            'albumID' => $request->input('albumID'),
            'userID' => Auth::id(),
        ]);

        return redirect()->route('albums.show', $request->input('albumID'))->with('success', 'Photo uploaded successfully.');
    }

    /**
     * Display the specified photo details.
     */
    public function show(Photo $photo)
    {
        // Return the view to show photo details
        return view('photos.show', compact('photo'));
    }

    /**
     * Update the specified photo information.
     */
    public function update(Request $request, Photo $photo)
    {
        // Validate the updated photo information
        $request->validate([
            'judulFoto' => 'required|max:255',
            'deskripsiFoto' => 'required|max:500',
            'albumID' => 'required|exists:albums,albumID',
            'photo' => 'nullable|image|max:2048', // Make the file optional for update
        ]);

        // Check if a new file is uploaded
        if ($request->hasFile('photo')) {
            // Delete the old file from storage
            Storage::disk('public')->delete($photo->lokasiFile);
            // Store the new file
            $path = $request->file('photo')->store('photos', 'public');
            $photo->lokasiFile = $path;
        }

        // Update the photo's details
        $photo->update([
            'judulFoto' => $request->input('judulFoto'),
            'deskripsiFoto' => $request->input('deskripsiFoto'),
            'albumID' => $request->input('albumID'),
        ]);

        return redirect()->route('albums.show', $photo->albumID)->with('success', 'Photo updated successfully.');
    }

    /**
     * Remove the specified photo from storage.
     */
    public function destroy(Photo $photo)
    {
        // Delete the file from storage
        Storage::disk('public')->delete($photo->lokasiFile);
        // Delete the photo from the database
        $photo->delete();

        return redirect()->route('albums.show', $photo->albumID)->with('success', 'Photo deleted successfully.');
    }
}
