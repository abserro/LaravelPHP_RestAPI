<?php

namespace App\Http\ApiV1\Modules\Genres\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class PatchGenreRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string'],
            'description' => ['nullable', 'string'],
        ];
    }
}
