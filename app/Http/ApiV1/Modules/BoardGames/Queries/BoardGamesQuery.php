<?php

namespace App\Http\ApiV1\Modules\BoardGames\Queries;

use App\Models\BoardGame;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BoardGamesQuery
{
    public function findOrFail(int $studioId): BoardGame
    {
        $boardGame = BoardGame::findOrFail($studioId);
        return $boardGame;
    }

    public function find(int $studioId): Model|Collection|BoardGame|array|null
    {
        $boardGame = BoardGame::find($studioId);
        return $boardGame;
    }

    public function findAll(): Model|Collection|BoardGame|array|null
    {
        $boardGame = BoardGame::all();
        return $boardGame;
    }

    public function allByOrder(string $param, bool $Desc = false): \Illuminate\Support\Collection
    {
        if (!$Desc)
            return BoardGame::orderBy($param)->get();
        else
            return BoardGame::orderBy($param, "desc")->get();
    }

    public function allByWhere(string $param, $operator): array|Collection
    {
        return BoardGame::where($param, $operator)->get();

    }

    public function allByWhereFast(string $param, $operator): object
    {
        return BoardGame::where($param, 'like', '%' . $operator . '%')->first();
    }
}
