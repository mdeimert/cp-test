<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Tests\TestCase;

class StarshipCrudTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Starships get all api test
     *
     * @return void
     */
    public function testGetStarshipsTest()
    {
        $response = $this->json('GET', '/api/v1/starships', ['page' => 2]);
        
        $response->assertStatus(200);

        $response->assertJsonPath('meta.current_page', 2);

        $response->assertJsonStructure([
            'data',
            'meta'
        ]);
    }

    /**
     * Starships get specific Starship
     *
     * @return void
     */
    public function testGetStarshipTest()
    {
        $response = $this->get('/api/v1/starships/1');
        
        $response->assertStatus(200);

        $response->assertJsonPath('id', 1);

        $response->assertJsonStructure([
            'id',
            'name',
            'crew',
            'model',
            'image'
        ]);
    }

    /**
     * Starships create
     *
     * @return void
     */
    public function testCreateStarshipTest()
    {
        $response = $this->json('POST', '/api/v1/starships', [
            'name' => 'testStarship',
            'crew' => 1,
            'model' => 'testStarshipModel',
            'image' => 'https://loremflickr.com/g/300/300/starship'
        ]);
        
        $response->assertStatus(201);

        $response->assertJsonPath('name', 'testStarship');

        $response->assertJsonStructure([
            'id',
            'name',
            'crew',
            'model',
            'image'
        ]);
    }

    /**
     * Starships update
     *
     * @return void
     */
    public function testUpdateStarshipTest()
    {
        $response = $this->json('PUT', '/api/v1/starships/1', [
            'name' => 'testStarship2'
        ]);
        
        $response->assertStatus(200);

        $response->assertJsonPath('name', 'testStarship2');

        $response->assertJsonStructure([
            'id',
            'name',
            'crew',
            'model',
            'image'
        ]);
    }

    /**
     * Starships delete
     *
     * @return void
     */
    public function testDeleteStarshipTest()
    {
        $response = $this->json('DELETE', '/api/v1/starships/1');
        
        $response->assertStatus(200);

        $response->assertJsonPath('status', true);
    }
}
