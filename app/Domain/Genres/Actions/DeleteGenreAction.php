<?php

namespace App\Domain\Genres\Actions;

use App\Models\Genre;

class DeleteGenreAction
{
    public function execute(int $studioId): void
    {
        $studio = Genre::findOrFail($studioId);
        $studio->delete();
    }
}
