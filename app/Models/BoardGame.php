<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardGame extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image', 'yearRelease', 'id_manufacturer', 'minPlayers', 'maxPlayers', 'minAge', 'price',
        'quantity'];

    protected $table = 'boardgames';
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genre', 'game_id', 'genre_id');
    }
}
