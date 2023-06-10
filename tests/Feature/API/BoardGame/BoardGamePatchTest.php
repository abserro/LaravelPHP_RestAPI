<?php

namespace API\BoardGame;

use App\Models\BoardGame;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BoardGamePatchTest extends TestCase
{
    use DatabaseTransactions;

    public function test_patch_boardgames_200(): void
    {
        $count = BoardGame::query()->count();
        $boardgameId = $count ? BoardGame::query()->inRandomOrder()->first()->id : 0;

        $boardgamesData = [
            'name' => 'string',
            'description' => "string",
            'image' => "string12345678910",
            'yearRelease' => "2023",
            'id_manufacturer' => "1",
            'minPlayers' => "2",
            'maxPlayers' => "7",
            'minAge' => "6",
            'price' => "1000",
            'quantity' => "100",
        ];

        $response = $this->patch('/api/v1/boardgames/' . $boardgameId, $boardgamesData);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => 'string',
            'description' => "string",
            'image' => "string12345678910",
            'yearRelease' => "2023",
            'id_manufacturer' => "1",
            'minPlayers' => "2",
            'maxPlayers' => "7",
            'minAge' => "6",
            'price' => "1000",
            'quantity' => "100",
        ]);

        // Assert that the boardgames exists in the database
        $this->assertDatabaseHas('boardgames', [
            'name' => 'string',
            'description' => "string",
            'image' => "string12345678910",
            'yearRelease' => "2023",
            'id_manufacturer' => "1",
            'minPlayers' => "2",
            'maxPlayers' => "7",
            'minAge' => "6",
            'price' => "1000",
            'quantity' => "100",
        ]);
    }

    public function test_patch_boardgames_422_byInvalid(): void
    {
        $count = BoardGame::query()->count();
        $boardgameId = $count ? BoardGame::query()->inRandomOrder()->first()->id : 0;

        $boardgamesData = [
            'name' => 'string',
            'description' => "string",
            'image' => "string",
            'yearRelease' => "2023-01-01",
            'id_manufacturer' => "1",
            'minPlayers' => "2",
            'maxPlayers' => "4",
            'minAge' => "1",
            'price' => "1",
            'quantity' => "100",
        ];

        $response = $this->patch('/api/v1/boardgames/' . $boardgameId, $boardgamesData);

        $response->assertStatus(422);

        $response->assertJsonStructure([
            'errors'
        ]);

        // Assert that the boardgames exists in the database
        $this->assertDatabaseMissing('boardgames', [
            'name' => 'string',
            'description' => "string",
            'image' => "string12345678910",
            'yearRelease' => "2023",
            'id_manufacturer' => "1",
            'minPlayers' => "2",
            'maxPlayers' => "7",
            'minAge' => "6",
            'price' => "1000",
            'quantity' => "100",
        ]);
    }

    public function test_patch_boardgames_404_byId(): void
    {
        $boardgamesData = [
            'name' => 'string',
            'description' => "string",
            'image' => "string12345678910",
            'yearRelease' => "2023",
            'id_manufacturer' => "1",
            'minPlayers' => "2",
            'maxPlayers' => "7",
            'minAge' => "6",
            'price' => "1000",
            'quantity' => "100",
        ];

        $response = $this->patch('/api/v1/boardgames/1000', $boardgamesData);

        $response->assertStatus(404);

        $response->assertJsonStructure([
            'errors'
        ]);

        // Assert that the boardgames exists in the database
        $this->assertDatabaseMissing('boardgames', [
            'name' => $boardgamesData['name'],
        ]);
    }
}
