<?php

use Tests\TestCase;
use Tests\ApiTestTrait;
use Tests\Traits\MakeRelationshipTrait;
use App\Models\Relationship;
use App\Repositories\RelationshipRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RelationshipRepositoryTest extends TestCase
{
    use MakeRelationshipTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RelationshipRepository
     */
    protected $relationshipRepo;

    public function setUp()
    {
        parent::setUp();
        $this->relationshipRepo = App::make(RelationshipRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRelationship()
    {
        $relationship = $this->fakeRelationshipData();
        $createdRelationship = $this->relationshipRepo->create($relationship);
        $createdRelationship = $createdRelationship->toArray();
        $this->assertArrayHasKey('id', $createdRelationship);
        $this->assertNotNull($createdRelationship['id'], 'Created Relationship must have id specified');
        $this->assertNotNull(Relationship::find($createdRelationship['id']), 'Relationship with given id must be in DB');
        $this->assertModelData($relationship, $createdRelationship);
    }

    /**
     * @test read
     */
    public function testReadRelationship()
    {
        $relationship = $this->makeRelationship();
        $dbRelationship = $this->relationshipRepo->find($relationship->id);
        $dbRelationship = $dbRelationship->toArray();
        $this->assertModelData($relationship->toArray(), $dbRelationship);
    }

    /**
     * @test update
     */
    public function testUpdateRelationship()
    {
        $relationship = $this->makeRelationship();
        $fakeRelationship = $this->fakeRelationshipData();
        $updatedRelationship = $this->relationshipRepo->update($fakeRelationship, $relationship->id);
        $this->assertModelData($fakeRelationship, $updatedRelationship->toArray());
        $dbRelationship = $this->relationshipRepo->find($relationship->id);
        $this->assertModelData($fakeRelationship, $dbRelationship->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRelationship()
    {
        $relationship = $this->makeRelationship();
        $resp = $this->relationshipRepo->delete($relationship->id);
        $this->assertTrue($resp);
        $this->assertNull(Relationship::find($relationship->id), 'Relationship should not exist in DB');
    }
}
