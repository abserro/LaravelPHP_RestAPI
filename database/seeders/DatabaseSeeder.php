<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BoardGame;
use App\Models\GameGenre;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        DB::table('boardgames')->truncate();
//        DB::table('genres')->truncate();
//        DB::table('game_genre')->truncate();
        Genre::factory()->count(50)->create();
        BoardGame::factory()->count(100)->create();
        GameGenre::factory()->count(150)->create();
    }
}
