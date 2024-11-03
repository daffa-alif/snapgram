<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Photo extends Model {

protected $primaryKey = 'fotoID';

protected $fillable = [
'judulFoto', 'deskripsi Foto',
'tanggalUnggah', 'lokasiFile',
'albumID', 'userID'
];

public function album() {
return $this->belongs To (Album::class, 'albumID');
}

public function user() {
return $this->belongs To (User::class, 'userID');
}

public function comments() {
return $this->hasMany (Comment::class, 'fotoID');
}

public function likes() {
return $this->hasMany (LikePhoto::class, 'fotoID');
}

public function isLikedByAuthUser() {
return $this->likes()->where('userID', Auth:: user()->userID)->exists();
}
}