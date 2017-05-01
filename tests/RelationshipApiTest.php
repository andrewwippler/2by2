<?php

use Tests\TestCase;
use Tests\Traits\MakeRelationshipTrait;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RelationshipApiTest extends TestCase
{
    use MakeRelationshipTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRelationship()
    {
        $relationship = $this->fakeRelationshipData();
        $response = $this->json('POST', '/api/v1/relationships', $relationship);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testReadRelationship()
    {
        $relationship = $this->makeRelationship();
        $response = $this->json('GET', '/api/v1/relationships/'.$relationship->id);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testUpdateRelationship()
    {
        $relationship = $this->makeRelationship();
        $editedRelationship = $this->fakeRelationshipData();

        $response = $this->json('PUT', '/api/v1/relationships/'.$relationship->id, $editedRelationship);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testDeleteRelationship()
    {
        $relationship = $this->makeRelationship();
        $response = $this->json('DELETE', '/api/v1/relationships/'.$relationship->id);

        $response->assertStatus(200);
        $response = $this->json('GET', '/api/v1/relationships/'.$relationship->id);

        $response->assertStatus(404);
    }
}
