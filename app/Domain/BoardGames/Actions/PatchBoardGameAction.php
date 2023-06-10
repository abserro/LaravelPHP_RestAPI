<?php

namespace App\Domain\BoardGames\Actions;

use App\Models\BoardGame;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PatchBoardGameAction
{
    public function execute(int $studioId, array $fields): Builder|array|Collection|Model
    {
        $user = BoardGame::findOrFail($studioId);
        $user->update($fields);
        return $user;
    }
}
