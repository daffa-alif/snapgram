<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Photo;
use App\Models\LikePhoto;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller {

  public function index (Album $album) {
    // Menampilkan daftar foto dari album yang dipilih
  }

  public function create() {
    $albums = Album::where('userID', auth()->id));
  }

  public function store (Request $request) {
    // Menyimpan foto baru ke database
  }

  public function show (Photo $photo) {
    // Menampilkan detail foto berdasarkan model yang dipassing
  }

  public function update (Request $request, Photo $photo) {
    // Mengupdate informasi foto
  }

  public function destroy(Photo $photo) {
    // Menghapus foto
  }
  public function like(Photo $photo) {
    // Menyukai atau membatalkan like pada foto
}

public function showComments(Photo $photo) {
    // Menampilkan komentar pada foto
}

public function storeComment(Request $request, Photo $photo) {
    // Menyimpan komentar baru
}
}