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
        $photos = Photo::all();
        return view('home', compact('photos'));
    }
}
