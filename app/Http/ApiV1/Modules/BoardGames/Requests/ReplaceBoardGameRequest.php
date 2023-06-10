<?php

namespace App\Http\ApiV1\Modules\BoardGames\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class ReplaceBoardGameRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:55'],
            'description' => ['required', 'string'],
            'image' => ['required', 'string', 'min:10', 'max:150'],
            'id_manufacturer' => ['required', 'integer', 'min:1'],
            'yearRelease' => ['required', 'integer', 'min:1900'],
            'minPlayers' => ['required', 'integer', 'min:1', 'max:5'],
            'maxPlayers' => ['required', 'integer', 'min:6', 'max:15'],
            'minAge' => ['required', 'integer', 'min:5', 'max:18'],
            'price' => ['required', 'integer', 'min:50', 'max:35000'],
            'quantity' => ['required', 'integer', 'min:1', 'max:100'],
        ];
    }
}
