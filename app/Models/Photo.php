<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'status',
        'album_id',
    ];

    
    public function album(){
        return $this -> belongsTo(Album::class);
    }

    public function likes(){
        return $this -> belongsToMany(User::class);
    }
}
