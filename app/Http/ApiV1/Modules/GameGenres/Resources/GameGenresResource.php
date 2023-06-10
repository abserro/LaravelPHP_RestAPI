<?php

namespace App\Http\ApiV1\Modules\GameGenres\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/** @mixin \App\Models\Genre */
class GameGenresResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        if ($this->resource instanceof Collection) {
            return $this->collectionResponse($this->resource);
        } else {
            return $this->singleResponse($this->resource);
        }
    }

    private function collectionResponse(Collection $collection): array
    {
        return $collection->map(function ($gameGenre) {
            return $this->singleResponse($gameGenre);
        })->toArray();
    }

    private function singleResponse(Model $gameGenre): array
    {
        return [
            'id' => $gameGenre->id,
            'game_id' => $gameGenre->studio_id,
            'genre_id' => $gameGenre->movie_id,
        ];
    }
}
