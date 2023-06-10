<?php

namespace App\Http\ApiV1\Modules\Genres\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class ReplaceGenreRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }
}
