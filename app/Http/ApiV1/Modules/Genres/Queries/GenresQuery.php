<?php

namespace App\Http\ApiV1\Modules\Genres\Queries;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GenresQuery
{
    public function findOrFail(int $studioId): Genre
    {
        $genre = Genre::findOrFail($studioId);
        return $genre;
    }

    public function find(int $studioId): Model|Collection|Genre|array|null
    {
        $genre = Genre::find($studioId);
        return $genre;
    }

    public function findAll(): Model|Collection|Genre|array|null
    {
        $genre = Genre::all();
        return $genre;
    }

    public function allByOrder(string $param, bool $Desc = false): \Illuminate\Support\Collection
    {
        if (!$Desc)
            return Genre::orderBy($param)->get();
        else
            return Genre::orderBy($param, "desc")->get();
    }

    public function allByWhere(string $param, $operator): array|Collection
    {
        return Genre::where($param, $operator)->get();

    }
}
