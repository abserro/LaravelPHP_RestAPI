<?php

namespace Database\Factories;

use App\Models\BoardGame;
use App\Models\GameGenre;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameGenreFactory extends Factory
{
    protected $model = GameGenre::class;

    public function definition(): array
    {
        return [
            'game_id' => BoardGame::query()->inRandomOrder()->first()->id,
            'genre_id' => Genre::query()->inRandomOrder()->first()->id
        ];
    }
}
