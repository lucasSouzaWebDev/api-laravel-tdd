<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BooksControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_books_get()
    {
        $response = $this->getJson('/api/books');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }
}
