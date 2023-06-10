<?php

namespace App\Domain\GameGenres\Actions;

use App\Models\GameGenre;

class DeleteGameGenreAction
{
    public function execute(int $studioId): void
    {
        $studio = GameGenre::findOrFail($studioId);
        $studio->delete();
    }
}
