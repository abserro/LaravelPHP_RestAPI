<?php

namespace App\Domain\Genres\Actions;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PatchGenreAction
{
    public function execute(int $studioId, array $fields): Builder|array|Collection|Model
    {
        $user = Genre::findOrFail($studioId);
        $user->update($fields);
        return $user;
    }
}
