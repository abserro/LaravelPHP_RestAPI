<?php

namespace App\Http\ApiV1\Modules\Manufacturers\Controllers;

use App\Domain\Manufacturers\Actions\CreateManufacturerAction;
use App\Domain\Manufacturers\Actions\DeleteManufacturerAction;
use App\Domain\Manufacturers\Actions\PatchManufacturerAction;
use App\Http\ApiV1\Modules\Manufacturers\Queries\ManufacturersQuery;
use App\Http\ApiV1\Modules\Manufacturers\Requests\CreateManufacturerRequest;
use App\Http\ApiV1\Modules\Manufacturers\Requests\PatchManufacturerRequest;
use App\Http\ApiV1\Modules\Manufacturers\Requests\ReplaceManufacturerRequest;
use App\Http\ApiV1\Modules\Directors\Resources\ManufacturersResource;
use App\Http\ApiV1\Support\Resources\EmptyResource;

class ManufacturersController
{
    public function create(CreateManufacturerRequest $request, CreateManufacturerAction $action)
    {
        return new ManufacturersResource($action->execute($request->validated()));
    }

    public function patch(int $manufacturerId, PatchManufacturerRequest $request, PatchManufacturerAction $action)
    {
        return new ManufacturersResource(
            $action->execute($manufacturerId, $request->validated())
        );
    }

    public function replace(int $manufacturerId, ReplaceManufacturerRequest $request, PatchManufacturerAction $action)
    {
        return new ManufacturersResource(
            $action->execute($manufacturerId, $request->validated())
        );
    }

    public function delete(int $manufacturerId, DeleteManufacturerAction $action)
    {
        $action->execute($manufacturerId);
        return response()->json(new EmptyResource(), 204);
    }

    public function get(int $manufacturerId, ManufacturersQuery $query)
    {

        $studio = $query->findOrFail($manufacturerId);

        return new ManufacturersResource($studio);
    }

    public function getAll(ManufacturersQuery $query)
    {
        $manufacturers = $query->findAll();

        if ($manufacturers->isEmpty()) {
            return response()->json(['message' => 'Пусто'], 204);
        }

        return new ManufacturersResource($manufacturers);
    }
//
//    public function allByOrderNameAsc(ManufacturersQuery $query)
//    {
//        $manufacturers = $query->allByOrder("name");
//
//        if ($manufacturers->isEmpty()) {
//            return response()->json(['message' => 'Пусто'], 204);
//        }
//
//        return new ManufacturersResource($manufacturers);
//    }
//
//    public function allByOrderNameDesc(ManufacturersQuery $query)
//    {
//        $manufacturers = $query->allByOrder("name", true);
//
//        if ($manufacturers->isEmpty()) {
//            return response()->json(['message' => 'Пусто'], 204);
//        }
//
//        return new ManufacturersResource($manufacturers);
//    }
//
//    public function allByOrderDateAsc(ManufacturersQuery $query)
//    {
//        $manufacturers = $query->allByOrder("year_of_foundation");
//
//        if ($manufacturers->isEmpty()) {
//            return response()->json(['message' => 'Пусто'], 204);
//        }
//
//        return new ManufacturersResource($manufacturers);
//    }
//
//    public function allByOrderDateDesc(ManufacturersQuery $query)
//    {
//        $manufacturers = $query->allByOrder("year_of_foundation", true);
//
//        if ($manufacturers->isEmpty()) {
//            return response()->json(['message' => 'Пусто'], 204);
//        }
//
//        return new ManufacturersResource($manufacturers);
//    }
//
//    public function allWhereDirectorActive(ManufacturersQuery $query)
//    {
//        $manufacturers = $query->allByWhere("active", "true");
//
//        if ($manufacturers->isEmpty()) {
//            return response()->json(['message' => 'Пусто'], 204);
//        }
//
//        return new ManufacturersResource($manufacturers);
//    }
}
