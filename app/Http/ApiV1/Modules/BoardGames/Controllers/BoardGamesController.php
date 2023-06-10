<?php

namespace App\Http\ApiV1\Modules\BoardGames\Controllers;

use App\Domain\BoardGames\Actions\CreateBoardGameAction;

//
use App\Domain\BoardGames\Actions\DeleteBoardGameAction;

//
use App\Domain\BoardGames\Actions\PatchBoardGameAction;
use App\Http\ApiV1\Modules\BoardGames\Queries\BoardGamesQuery;

//
use App\Http\ApiV1\Modules\BoardGames\Requests\CreateBoardGameRequest;

//
use App\Http\ApiV1\Modules\BoardGames\Requests\PatchBoardGameRequest;
use App\Http\ApiV1\Modules\BoardGames\Requests\ReplaceBoardGameRequest;
use App\Http\ApiV1\Modules\BoardGames\Resources\BoardGamesResource;
use App\Http\ApiV1\Support\Resources\EmptyResource;
use App\Models\Genre;

//
class BoardGamesController
{
    public function create(CreateBoardGameRequest $request, CreateBoardGameAction $action)
    {
        return new BoardGamesResource($action->execute($request->validated()));
    }

    public function patch(int $BoardGamesId, PatchBoardGameRequest $request, PatchBoardGameAction $action)
    {
        return new BoardGamesResource(
            $action->execute($BoardGamesId, $request->validated())
        );
    }

    public function replace(int $BoardGamesId, ReplaceBoardGameRequest $request, PatchBoardGameAction $action)
    {
        return new BoardGamesResource(
            $action->execute($BoardGamesId, $request->validated())
        );
    }

    public function delete(int $BoardGamesId, DeleteBoardGameAction $action)
    {
        $action->execute($BoardGamesId);
        return response()->json(new EmptyResource(), 204);
    }

    public function get(int $BoardGamesId, BoardGamesQuery $query)
    {

        $movie = $query->findOrFail($BoardGamesId);

        return new BoardGamesResource($movie);
    }

    public function getAll(BoardGamesQuery $query)
    {
        $boardGames = $query->findAll();

        if ($boardGames->isEmpty()) {
            return response()->json(['message' => 'Пусто'], 204);
        }

        return new BoardGamesResource($boardGames);
    }

    public function allByOrderNameAsc(BoardGamesQuery $query)
    {
        $boardGames = $query->allByOrder("name");

        if ($boardGames->isEmpty()) {
            return response()->json(['message' => 'Пусто'], 204);
        }

        return new BoardGamesResource($boardGames);
    }

    public function allByOrderNameDesc(BoardGamesQuery $query)
    {
        $boardGames = $query->allByOrder("name", true);

        if ($boardGames->isEmpty()) {
            return response()->json(['message' => 'Пусто'], 204);
        }

        return new BoardGamesResource($boardGames);
    }

    public function allByOrderDateAsc(BoardGamesQuery $query)
    {
        $boardGames = $query->allByOrder("yearRelease");

        if ($boardGames->isEmpty()) {
            return response()->json(['message' => 'Пусто'], 204);
        }

        return new BoardGamesResource($boardGames);
    }

    public function allByOrderDateDesc(BoardGamesQuery $query)
    {
        $boardGames = $query->allByOrder("yearRelease", true);

        if ($boardGames->isEmpty()) {
            return response()->json(['message' => 'Пусто'], 204);
        }

        return new BoardGamesResource($boardGames);
    }
}
