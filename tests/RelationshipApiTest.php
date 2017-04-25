<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RelationshipApiTest extends TestCase
{
    use MakeRelationshipTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRelationship()
    {
        $relationship = $this->fakeRelationshipData();
        $this->json('POST', '/api/v1/relationships', $relationship);

        $this->assertApiResponse($relationship);
    }

    /**
     * @test
     */
    public function testReadRelationship()
    {
        $relationship = $this->makeRelationship();
        $this->json('GET', '/api/v1/relationships/'.$relationship->id);

        $this->assertApiResponse($relationship->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRelationship()
    {
        $relationship = $this->makeRelationship();
        $editedRelationship = $this->fakeRelationshipData();

        $this->json('PUT', '/api/v1/relationships/'.$relationship->id, $editedRelationship);

        $this->assertApiResponse($editedRelationship);
    }

    /**
     * @test
     */
    public function testDeleteRelationship()
    {
        $relationship = $this->makeRelationship();
        $this->json('DELETE', '/api/v1/relationships/'.$relationship->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/relationships/'.$relationship->id);

        $this->assertResponseStatus(404);
    }
}
