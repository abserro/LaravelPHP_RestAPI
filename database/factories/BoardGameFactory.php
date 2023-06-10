<?php

namespace Database\Factories;

use App\Models\BoardGame;
use App\Models\Manufacturer;
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
            'description' => $this->faker->unique()->sentence,
            'image' => $imageUrl,
            'id_manufacturer' => Manufacturer::pluck('id')->random(),
            'yearRelease' => $this->faker->year,
            'minPlayers' => $this->faker->numberBetween(1, 5),
            'maxPlayers' => $this->faker->numberBetween(6, 15),
            'minAge' => $this->faker->numberBetween(5, 18),
            'price' => $this->faker->numberBetween(50, 35000),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
