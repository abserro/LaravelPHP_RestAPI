<?php

namespace App\Http\ApiV1\Modules\Genres\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class CreateGenreRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:55'],
            'description' => ['nullable', 'string'],
        ];
    }
}
