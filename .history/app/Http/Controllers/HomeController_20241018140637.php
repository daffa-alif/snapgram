<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $photos = Photo::all();
        return view('home', compact('photos'));
    }
}
