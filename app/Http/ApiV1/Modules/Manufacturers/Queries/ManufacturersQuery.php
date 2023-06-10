<?php

namespace App\Http\ApiV1\Modules\Manufacturers\Queries;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ManufacturersQuery
{
    public function findOrFail(int $studioId): Manufacturer
    {
        $studio = Manufacturer::findOrFail($studioId);
        return $studio;
    }

    public function find(int $studioId): Model|Collection|Manufacturer|array|null
    {
        $studio = Manufacturer::find($studioId);
        return $studio;
    }

    public function findAll(): Model|Collection|Manufacturer|array|null
    {
        $studio = Manufacturer::all();
        return $studio;
    }

    public function allByOrder(string $param, bool $Desc = false): \Illuminate\Support\Collection
    {
        if (!$Desc)
            return Manufacturer::orderBy($param)->get();
        else
            return Manufacturer::orderBy($param, "desc")->get();
    }

    public function allByWhere(string $param, $operator): array|Collection
    {
        return Manufacturer::where($param, $operator)->get();

    }
}
