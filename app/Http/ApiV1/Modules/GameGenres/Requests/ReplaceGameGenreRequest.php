<?php

namespace App\Http\ApiV1\Modules\GameGenres\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class ReplaceGameGenreRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'game_id' => ['required', 'integer', 'min:1'],
            'genre_id' => ['required', 'integer', 'min:1'],
        ];
    }
}
