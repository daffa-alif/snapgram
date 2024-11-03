<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Import the User model if necessary

class Album extends Model
{
    protected $primaryKey = 'albumID';
    protected $fillable = [
        'namaAlbum',
        'deskripsi',
        'tanggalDibuat',
        'userID'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
