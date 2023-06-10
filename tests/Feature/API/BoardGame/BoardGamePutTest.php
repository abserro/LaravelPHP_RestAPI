<?php

namespace API\BoardGame;

use App\Models\BoardGame;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BoardGamePutTest extends TestCase
{
    use DatabaseTransactions; // Если вы используете базу данных, для обновления БД после каждого теста

    public function test_put_boardgames_200(): void
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

        $response = $this->put('/api/v1/boardgames/' . $boardgameId, $boardgamesData);

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
            'name' => $boardgamesData['name'],
            'description' => $boardgamesData['description'],
        ]);
    }

    public function test_put_boardgames_422_byInvalid(): void
    {
        $count = BoardGame::query()->count();
        $boardgameId = $count ? BoardGame::query()->inRandomOrder()->first()->id : 0;

        $boardgamesData = [
            'name' => 'string',
            'description' => "string",
            'image' => "strin",
        ];

        $response = $this->put('/api/v1/boardgames/' . $boardgameId, $boardgamesData);

        $response->assertStatus(422);

        $response->assertJsonStructure([
            'errors'
        ]);

        // Assert that the boardgames exists in the database
        $this->assertDatabaseMissing('boardgames', [
            'name' => $boardgamesData['name'],
        ]);
    }

    public function test_put_boardgames_404_byId(): void
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

        $response = $this->put('/api/v1/boardgames/100000', $boardgamesData);

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
