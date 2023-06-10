<?php

namespace App\Domain\Manufacturers\Actions;

use App\Models\Manufacturer;

class DeleteManufacturerAction
{
    public function execute(int $studioId): void
    {
        $studio = Manufacturer::findOrFail($studioId);
        $studio->delete();
    }
}
