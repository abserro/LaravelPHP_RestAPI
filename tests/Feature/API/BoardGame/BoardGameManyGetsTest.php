<?php

namespace API\BoardGame;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class BoardGameManyGetsTest extends TestCase
{
    use DatabaseTransactions; // Если вы используете базу данных, для обновления БД после каждого теста

    public function test_all_boardgames_200(): void
    {
        $response = $this->get('/api/v1/boardgames/');

        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) {
            $json->has('data');
        });
    }

    public function test_get_all_orderByDateAsc_boardgames_200(): void
    {
        $response = $this->get('/api/v1/boardgames/orderByDateAsc');

        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) {
            $json->has('data');
        });
    }

    public function test_get_orderByDateDesc_boardgames_200(): void
    {
        $response = $this->get('/api/v1/boardgames/orderByDateDesc');

        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) {
            $json->has('data');
        });
    }
}
