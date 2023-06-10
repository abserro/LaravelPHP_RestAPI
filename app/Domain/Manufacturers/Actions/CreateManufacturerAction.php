<?php

namespace App\Domain\Manufacturers\Actions;

use App\Models\Manufacturer;

class CreateManufacturerAction
{
    public function execute(array $data): Manufacturer
    {
        return Manufacturer::create($data);
    }
}
