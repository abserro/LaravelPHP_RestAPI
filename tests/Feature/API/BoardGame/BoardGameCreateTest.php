<?php

namespace API\BoardGame;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BoardGameCreateTest extends TestCase
{
    use DatabaseTransactions;

    public function test_create_game_201(): void
    {
        $gameData = [
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

        $response = $this->post('/api/v1/boardgames', $gameData);

        $response->assertStatus(201);
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

    public function test_create_game_422(): void
    {
        $gameData = [
            'name' => 'string',
            'description' => "string",
            'image' => "string",
            'yearRelease' => "2023",
            'id_manufacturer' => "1",
            'minPlayers' => "2",
            'maxPlayers' => "5",
            'minAge' => "1",
            'price' => "1000",
            'quantity' => "100",
        ];

        $response = $this->post('/api/v1/boardgames', $gameData);

        $response->assertStatus(422);

        $response->assertJsonStructure([
            'errors'
        ]);

        $this->assertDatabaseMissing('boardgames', [
            'name' => 'string',
            'description' => "string",
            'image' => "string",
            'yearRelease' => "2023",
            'id_manufacturer' => "1",
            'minPlayers' => "2",
            'maxPlayers' => "5",
            'minAge' => "6",
            'price' => "1000",
            'quantity' => "100",
        ]);
    }
}
