<?php

namespace API\BoardGame;

use App\Models\BoardGame;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BoardGameDeleteTest extends TestCase
{
    use DatabaseTransactions;

    public function test_delete_boardgame_204(): void
    {
        $countStudio = BoardGame::query()->count();
        $boardgameId = $countStudio ? BoardGame::query()->inRandomOrder()->first()->id : 0;

        $response = $this->delete('/api/v1/boardgames/' . $boardgameId);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('boardgames', [
            'id' => $boardgameId,
        ]);
    }

    public function test_delete_boardgame_404_byId(): void
    {
        $response = $this->delete('/api/v1/boardgames/4200');

        $response->assertStatus(404);
    }

}
