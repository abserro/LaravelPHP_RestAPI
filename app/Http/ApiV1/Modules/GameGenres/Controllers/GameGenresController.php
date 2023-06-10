<?php

namespace App\Http\ApiV1\Modules\GameGenres\Controllers;

use App\Domain\GameGenres\Actions\CreateGameGenreAction;
use App\Domain\GameGenres\Actions\DeleteGameGenreAction;
use App\Domain\GameGenres\Actions\PatchGameGenresAction;
use App\Http\ApiV1\Modules\GameGenres\Queries\GameGenreQuery;
use App\Http\ApiV1\Modules\GameGenres\Requests\CreateGameGenreRequest;
use App\Http\ApiV1\Modules\GameGenres\Requests\ReplaceGameGenreRequest;
use App\Http\ApiV1\Modules\GameGenres\Resources\GameGenresResource;
use App\Http\ApiV1\Support\Resources\EmptyResource;
use App\Models\BoardGame;
use App\Models\GameGenre;
use App\Models\Genre;

class GameGenresController
{
    public function create(CreateGameGenreRequest $request, CreateGameGenreAction $action)
    {
        $validatedData = $request->validated();

        $gameId = $validatedData['game_id'];
        $relationId = $validatedData['genre_id'];

        $relationExists = GameGenre::where('game_id', $gameId)
            ->where('genre_id', $relationId)
            ->exists();

        if ($relationExists) {
            return response()->json(['error' => 'The relation already exists.'], 409);
        }

        $gameExists = BoardGame::where('id', $gameId)->exists();
        $relationExists = Genre::where('id', $relationId)->exists();

        if (!$gameExists || !$relationExists) {
            return response()->json(['error' => 'One or both IDs are invalid.'], 404);
        }

        $relation = $action->execute($validatedData);

        return new GameGenresResource($relation);
    }

    public function replace(int $relationId, ReplaceGameGenreRequest $request, PatchGameGenresAction $action)
    {
        $validatedData = $request->validated();

        $gameId = $validatedData['game_id'];
        $relationId = $validatedData['genre_id'];

        $relationExists = GameGenre::where('game_id', $gameId)
            ->where('genre_id', $relationId)
            ->exists();

        if ($relationExists) {
            return response()->json(['error' => 'The relation already exists.'], 409);
        }

        $gameExists = BoardGame::where('id', $gameId)->exists();
        $relationExists = Genre::where('id', $relationId)->exists();

        if (!$gameExists || !$relationExists) {
            return response()->json(['error' => 'One or both IDs are invalid.'], 404);
        }

        $relation = $action->execute($relationId, $validatedData);

        return new GameGenresResource($relation);
    }

    public function delete(int $relationId, DeleteGameGenreAction $action)
    {
        $action->execute($relationId);
        return response()->json(new EmptyResource(), 204);
    }

    public function get(int $relationId, GameGenreQuery $query)
    {

        $relation = $query->findOrFail($relationId);

        return new GameGenresResource($relation);
    }

    public function getAll(GameGenreQuery $query)
    {
        $relations = $query->findAll();

        if ($relations->isEmpty()) {
            return response()->json(['message' => 'Пусто'], 204);
        }

        return new GameGenresResource($relations);
    }

    ////
    public function allByGameId(int $gameId, GameGenreQuery $query)
    {
        $relations = $query->allByWhere("game_id", $gameId);
        if ($relations->isEmpty()) {
            return response()->json(['message' => 'Пусто'], 204);
        }
        return new GameGenresResource($relations);
    }

    public function allByGenreId(int $relationId, GameGenreQuery $query)
    {
        $relations = $query->allByWhere("game_id", $relationId);
        if ($relations->isEmpty()) {
            return response()->json(['message' => 'Пусто'], 204);
        }
        return new GameGenresResource($relations);
    }

    public function createRelation(int $relationId, int $gameId, CreateGameGenreRequest $action)
    {
        $relationData = [
            'game_id' => $gameId,
            'genre_id' => $relationId,
        ];

        $relation = $action->execute($relationData);

        return new GameGenresResource($relation);
    }
}
