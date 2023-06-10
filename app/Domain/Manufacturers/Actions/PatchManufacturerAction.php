<?php

namespace App\Domain\Manufacturers\Actions;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PatchManufacturerAction
{
    public function execute(int $studioId, array $fields): Builder|array|Collection|Model
    {
        $user = Manufacturer::findOrFail($studioId);
        $user->update($fields);
        return $user;
    }
}
