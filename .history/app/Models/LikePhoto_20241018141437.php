<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikePhoto extends Model
{
    use HasFactory; // Include HasFactory if you're using factories for testing

    protected $primaryKey = 'likeID'; // Set the primary key

    protected $fillable = [
        'tanggalLike',
        'fotoID',
        'userID',
    ];

    // Define the relationship with the Photo model
    public function photo()
    {
        return $this->belongsTo(Photo::class, 'fotoID');
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
