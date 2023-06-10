<?php

namespace App\Http\ApiV1\Modules\Genres\Controllers;

use App\Domain\Genres\Actions\CreateGenreAction;
use App\Domain\Genres\Actions\DeleteGenreAction;
use App\Domain\Genres\Actions\PatchGenreAction;
use App\Http\ApiV1\Modules\Genres\Queries\GenresQuery;
use App\Http\ApiV1\Modules\Genres\Requests\CreateGenreRequest;
use App\Http\ApiV1\Modules\Genres\Requests\PatchGenreRequest;
use App\Http\ApiV1\Modules\Genres\Requests\ReplaceGenreRequest;
use App\Http\ApiV1\Modules\Genres\Resources\GenresResource;
use App\Http\ApiV1\Support\Resources\EmptyResource;

class GenresController
{
    public function create(CreateGenreRequest $request, CreateGenreAction $action)
    {
        return new GenresResource($action->execute($request->validated()));
    }

    public function patch(int $genreId, PatchGenreRequest $request, PatchGenreAction $action)
    {
        return new GenresResource(
            $action->execute($genreId, $request->validated())
        );
    }

    public function replace(int $genreId, ReplaceGenreRequest $request, PatchGenreAction $action)
    {
        return new GenresResource(
            $action->execute($genreId, $request->validated())
        );
    }

    public function delete(int $genreId, DeleteGenreAction $action)
    {
        $action->execute($genreId);
        return response()->json(new EmptyResource(), 204);
    }

    public function get(int $genreId, GenresQuery $query)
    {

        $studio = $query->findOrFail($genreId);

        return new GenresResource($studio);
    }

    public function getAll(GenresQuery $query)
    {
        $genres = $query->findAll();

        if ($genres->isEmpty()) {
            return response()->json(['message' => 'Пусто'], 204);
        }

        return new GenresResource($genres);
    }

    public function allByOrderNameAsc(GenresQuery $query)
    {
        $genres = $query->allByOrder("name");


        if ($genres->isEmpty()) {
            return response()->json(['message' => 'Пусто'], 204);
        }

        return new GenresResource($genres);
    }

    public function allByOrderNameDesc(GenresQuery $query)
    {
        $genres = $query->allByOrder("name", true);

        if ($genres->isEmpty()) {
            return response()->json(['message' => 'Пусто'], 204);
        }

        return new GenresResource($genres);
    }
}
