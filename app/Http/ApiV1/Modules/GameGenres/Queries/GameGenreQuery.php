<?php

namespace App\Http\ApiV1\Modules\GameGenres\Queries;

use App\Models\GameGenre;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GameGenreQuery
{
    public function findOrFail(int $gameGenreId): GameGenre
    {
        $gameGenre = GameGenre::findOrFail($gameGenreId);
        return $gameGenre;
    }

    public function find(int $gameGenreId): Model|Collection|GameGenre|array|null
    {
        $gameGenre = GameGenre::find($gameGenreId);
        return $gameGenre;
    }

    public function findAll(): Model|Collection|GameGenre|array|null
    {
        $gameGenre = GameGenre::all();
        return $gameGenre;
    }

    public function allByOrder(string $param, bool $Desc = false): \Illuminate\Support\Collection
    {
        if (!$Desc)
            return GameGenre::orderBy($param)->get();
        else
            return GameGenre::orderBy($param, "desc")->get();
    }

    public function allByWhere(string $param, $operator): array|Collection
    {
        return GameGenre::where($param, $operator)->get();

    }
}
