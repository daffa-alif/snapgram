<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $primaryKey = 'fotoID';

    protected $fillable = [
        'judulFoto',
        'deskripsiFoto',
        'tanggalUnggah',
        'lokasiFile',
        'albumID',
        'userID',
    ];

    public function album() {
        return $this->belongsTo(Album::class, 'albumID');
    }

    public function user() {
        return $this->belongsTo(User::class, 'userID');
    }
}
