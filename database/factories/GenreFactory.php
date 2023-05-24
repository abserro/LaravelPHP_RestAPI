<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class GenreFactory extends Factory
{
    protected $model = Genre::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'code' => $this->faker->unique()->regexify('[A-Za-z0-9_-]{10}'),
            'description' => $this->faker->unique()->sentence,
        ];
    }
}
