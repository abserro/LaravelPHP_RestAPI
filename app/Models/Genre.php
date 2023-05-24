<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public function boardGames()
    {
        return $this->belongsToMany(BoardGame::class, 'game_genre', 'genre_id', 'game_id');
    }
}
