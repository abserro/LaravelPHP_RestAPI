<?php

namespace API\BoardGame;

use App\Models\BoardGame;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BoardGameGetTest extends TestCase
{
    use DatabaseTransactions;

    public function test_get_boardgame_200(): void
    {
        $count = BoardGame::query()->count();
        $boardgameData = $count ? BoardGame::query()->inRandomOrder()->first() : null;

        $response = $this->get('/api/v1/boardgames/'. $boardgameData->id);

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'data' => [
                'name' => $boardgameData->name,
                'description' => $boardgameData->description,
                'image' => $boardgameData->image,
                'yearRelease' => $boardgameData->yearRelease,
                'id_manufacturer' => $boardgameData->id_manufacturer,
                'minPlayers' => $boardgameData->minPlayers,
                'maxPlayers' => $boardgameData->maxPlayers,
                'minAge' => $boardgameData->minAge,
                'price' => $boardgameData->price,
                'quantity' => $boardgameData->quantity,
            ]
        ]);
    }

    public function test_get_boardgame_404_byId(): void
    {
        $response = $this->get('/api/v1/boardgames/1000000');

        $response->assertStatus(404);
    }
}
