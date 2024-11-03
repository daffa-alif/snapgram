<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo; // Add this line to import the Photo model
use App\Models\Album;
use App\Models\LikePhoto;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index() {
        // Load photos with their like count
        $photos = Photo::withCount('likes')->get(); // Add withCount('likes') to get the likes count
        
        return view('home', compact('photos'));
    }
}
