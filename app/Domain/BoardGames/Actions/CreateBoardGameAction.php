<?php

namespace App\Domain\BoardGames\Actions;

use App\Models\BoardGame;

class CreateBoardGameAction
{
    public function execute(array $data): BoardGame
    {
        return BoardGame::create($data);
    }
}
