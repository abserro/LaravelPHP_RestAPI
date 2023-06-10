<?php

namespace App\Http\ApiV1\Modules\Genres\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/** @mixin \App\Models\Genre */
class GenresResource extends BaseJsonResource
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
        return $collection->map(function ($genre) {
            return $this->singleResponse($genre);
        })->toArray();
    }

    private function singleResponse(Model $genre): array
    {
        return [
            'id' => $genre->id,
            'name' => $genre->name,
            'description' => $genre->description,
            'created_at' => $genre->created_at,
            'updated_at' => $genre->updated_at,
        ];
    }
}
