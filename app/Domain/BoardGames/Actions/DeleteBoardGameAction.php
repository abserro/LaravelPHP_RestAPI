<?php

namespace App\Domain\BoardGames\Actions;

use App\Models\BoardGame;

class DeleteBoardGameAction
{
    public function execute(int $studioId): void
    {
        $studio = BoardGame::findOrFail($studioId);
        $studio->delete();
    }
}
