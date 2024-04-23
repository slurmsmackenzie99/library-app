<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EndpointTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test GET /api/authors endpoint.
     *
     * @return void
     */
    public function testGetAuthors()
    {
        $response = $this->get('/api/authors');

        $response->assertStatus(200);
    }

    /**
     * Test POST /api/authors endpoint.
     *
     * @return void
     */
    public function testCreateAuthor()
    {
        $data = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'place_of_birth' => 'New York',
        ];

        $response = $this->postJson('/api/authors', $data);

        $response->assertStatus(201);
    }

        /**
     * Test GET /api/items endpoint.
     *
     * @return void
     */
    public function testGetItems()
    {
        $response = $this->get('/api/items');

        $response->assertStatus(200);
    }

    /**
     * Test POST /api/items endpoint.
     *
     * @return void
     */
    public function testCreateItem()
    {
        $data = [
            'type' => 'Book',
            'title' => 'Sample Book',
            'price' => 10.99,
            'author_id' => 1,
            'genre' => 'Fantasy',
        ];

        $response = $this->postJson('/api/items', $data);

        $response->assertStatus(201);
    }

    /**
     * Test GET /api/items/{id}/description endpoint.
     *
     * @return void
     */
    public function testGetItemDescription()
    {
        $response = $this->get('/api/items/1/description');

        $response->assertStatus(200);
    }

    /**
     * Test PUT /api/items/{id} endpoint.
     *
     * @return void
     */
    public function testUpdateItem()
    {
        $data = [
            'type' => 'Comic',
            'title' => 'Sample Comic',
            'price' => 8.99,
            'author_id' => 1,
            'series' => 'Marvel Universe',
        ];

        $response = $this->putJson('/api/items/1', $data);

        $response->assertStatus(200);
    }

    /**
     * Test DELETE /api/items/{id} endpoint.
     *
     * @return void
     */
    public function testDeleteItem()
    {
        $response = $this->delete('/api/items/1');

        $response->assertStatus(200);
    }
}
