<?php

namespace App\Http\ApiV1\Modules\BoardGames\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/** @mixin \App\Models\BoardGame */
class BoardGamesResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        if ($this->resource instanceof Collection) {
            // Обрабатываем коллекцию моделей
            return $this->collectionResponse($this->resource);
        } else {
            // Обрабатываем одиночную модель
            return $this->singleResponse($this->resource);
        }
    }

    private function collectionResponse(Collection $collection): array
    {
        return $collection->map(function ($boardGame) {
            return $this->singleResponse($boardGame);
        })->toArray();
    }

    private function singleResponse(Model $boardGame): array
    {
        return [
            'name' => $boardGame->name,
            'description' => $boardGame->description,
            'image' => $boardGame->image,
            'id_manufacturer' => $boardGame->id_manufacturer,
            'yearRelease' => $boardGame->yearRelease,
            'minPlayers' => $boardGame->minPlayers,
            'maxPlayers' => $boardGame->maxPlayers,
            'minAge' => $boardGame->minAge,
            'price' => $boardGame->price,
            'quantity' => $boardGame->quantity,
        ];
    }
}
