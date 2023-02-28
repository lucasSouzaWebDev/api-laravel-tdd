<?php

namespace Tests\Feature\Api;

use App\Models\Resource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResourceTest extends TestCase
{
    public function test_get_all()
    {
        $response = $this->getJson('/api/resources');

        $response->assertStatus(200);
    }

    public function test_get_all_with_total()
    {
        Resource::factory()->count(10)->create();
        $response = $this->getJson('/api/resources');

        $response->assertStatus(200)
                    ->assertJsonCount(10, 'data');
    }

    public function test_get_resource()
    {
        $resource = Resource::factory()->create();

        $response = $this->getJson("/api/resources/{$resource->id}");

        $response->assertStatus(200);
    }

    public function test_get_resource_not_found()
    {
        $response = $this->getJson("/api/resources/505");

        $response->assertStatus(404);
    }

    public function test_validations_create()
    {
        $data = [];
        $response = $this->postJson("/api/resources", $data);

        $response->assertStatus(422);
    }

    public function test_create()
    {
        $data = [
            'name' => 'New Resource'
        ];
        $response = $this->postJson("/api/resources", $data);

        $response->assertStatus(201);
    }

    public function test_update()
    {
        $resource = Resource::factory()->create();

        $data = [
            'name' => 'Updated Resource'
        ];

        $response = $this->putJson("/api/resources/{$resource->id}", $data);

        $response->assertStatus(204);
    }

    public function test_update_invalid_identify()
    {
        $data = [
            'name' => 'Updated Resource'
        ];

        $response = $this->putJson("/api/resources/505", $data);

        $response->assertStatus(404);
    }
    
    public function test_validations_update()
    {
        $resource = Resource::factory()->create();

        $data = [];

        $response = $this->putJson("/api/resources/{$resource->id}", $data);

        $response->assertStatus(422);
    }

    public function test_delete()
    {
        $resource = Resource::factory()->create();

        $response = $this->deleteJson("/api/resources/{$resource->id}");

        $response->assertStatus(204);
    }
}
