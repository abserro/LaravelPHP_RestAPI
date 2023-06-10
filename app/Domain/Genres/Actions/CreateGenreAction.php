<?php

namespace App\Domain\Genres\Actions;

use App\Models\Genre;

class CreateGenreAction
{
    public function execute(array $data): Genre
    {
        return Genre::create($data);
    }
}
