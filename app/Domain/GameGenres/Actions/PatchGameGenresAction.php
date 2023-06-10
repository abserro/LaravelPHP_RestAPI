<?php

namespace App\Domain\GameGenres\Actions;

use App\Models\GameGenre;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PatchGameGenresAction
{
    public function execute(int $studioId, array $fields): Builder|array|Collection|Model
    {
        $user = GameGenre::findOrFail($studioId);
        $user->update($fields);
        return $user;
    }
}
