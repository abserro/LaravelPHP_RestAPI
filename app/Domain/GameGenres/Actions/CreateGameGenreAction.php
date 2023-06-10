<?php

namespace App\Domain\GameGenres\Actions;

use App\Models\GameGenre;

class CreateGameGenreAction
{
    public function execute(array $data): GameGenre
    {
        return GameGenre::create($data);
    }
}
