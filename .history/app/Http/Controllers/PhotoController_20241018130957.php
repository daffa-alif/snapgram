<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Photo;
use App\Models\LikePhoto;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the photos for a specific album.
     */
    public function index(Album $album)
    {
        // Check if the album belongs to the authenticated user or is public
        $photos = Photo::where('albumID', $album->albumID)->get();
        return view('photos.index', compact('album', 'photos'));
    }

    /**
     * Show the form for creating a new photo.
     */
    public function create()
    {
        // Get all albums for the authenticated user to choose from when uploading a photo
        $albums = Album::where('userID', auth()->id())->get();
        return view('photos.create', compact('albums'));
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
            'file' => 'required|image|max:2048', // Ensure the file is an image and max size is 2MB
        ]);

        // Handle file upload
        $path = $request->file('file')->store('photos', 'public');

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
        // Check if the photo belongs to the authenticated user or is publicly accessible
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
        ]);

        // Check if a new file is uploaded
        if ($request->hasFile('file')) {
            // Validate the new file
            $request->validate(['file' => 'image|max:2048']);

            // Delete the old file from storage
            Storage::disk('public')->delete($photo->lokasiFile);

            // Store the new file
            $path = $request->file('file')->store('photos', 'public');
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

    /**
     * Like or unlike a photo.
     */
    public function like(Photo $photo)
    {
        // Check if the user has already liked the photo
        $like = LikePhoto::where('userID', Auth::id())->where('photoID', $photo->fotoID)->first();

        if ($like) {
            // If the photo is already liked, remove the like (unlike)
            $like->delete();
        } else {
            // Otherwise, add a new like
            LikePhoto::create([
                'userID' => Auth::id(),
                'photoID' => $photo->fotoID,
            ]);
        }

        return back()->with('success', 'Photo like status updated.');
    }

    /**
     * Display the comments for a photo.
     */
    public function showComments(Photo $photo)
    {
        // Retrieve comments related to the photo
        $comments = Comment::where('photoID', $photo->fotoID)->get();
        return view('photos.comments', compact('photo', 'comments'));
    }

    /**
     * Store a new comment on the photo.
     */
    public function storeComment(Request $request, Photo $photo)
    {
        // Validate the comment input
        $request->validate([
            'commentText' => 'required|max:500',
        ]);

        // Create a new comment
        Comment::create([
            'commentText' => $request->input('commentText'),
            'userID' => Auth::id(),
            'photoID' => $photo->fotoID,
        ]);

        return back()->with('success', 'Comment added successfully.');
    }
}
