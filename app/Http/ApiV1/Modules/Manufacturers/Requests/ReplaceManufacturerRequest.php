<?php

namespace App\Http\ApiV1\Modules\Manufacturers\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class ReplaceManufacturerRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:55'],
            'description' => ['required', 'string'],
            'country' => ['required', 'string', 'min:3', 'max:55'],
            'email' => ['required', 'string', 'min:3', 'max:55'],
        ];
    }
}
