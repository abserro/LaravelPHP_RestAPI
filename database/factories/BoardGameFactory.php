<?php

namespace Database\Factories;

use App\Models\BoardGame;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoardGameFactory extends Factory
{
    protected $model = BoardGame::class;

    public function definition(): array
    {
        $name = $this->faker->name;
        $imageUrl = $this->faker->imageUrl(400, 600) . '?label=' . urlencode($name);

        return [
            'name' => $name,
            'code' => $this->faker->unique()->regexify('[A-Za-z0-9_-]{10}'),
            'description' => $this->faker->unique()->sentence,
            'image' => $imageUrl,
            'yearRelease' => $this->faker->year,
            'minPlayers' => $this->faker->numberBetween(1, 5),
            'maxPlayers' => $this->faker->numberBetween(6, 15),
            'minAge' => $this->faker->numberBetween(5, 18),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'quantity' => $this->faker->numberBetween(1, 100),
            'active' => $this->faker->boolean,
        ];
    }
}
