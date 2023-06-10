<?php

namespace App\Http\ApiV1\Modules\Manufacturers\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class PatchManufacturerRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string', 'min:3', 'max:55'],
            'description' => ['string'],
            'country' => ['string', 'min:3', 'max:55'],
            'email' => ['string', 'min:3', 'max:55'],
        ];
    }
}
