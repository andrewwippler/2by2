<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\ApiTestTrait;
use Tests\Traits\MakeMaritalStatusTrait;
use App\Models\MaritalStatus;
use App\Repositories\MaritalStatusRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaritalStatusRepositoryTest extends TestCase
{
    use MakeMaritalStatusTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MaritalStatusRepository
     */
    protected $maritalStatusRepo;

    public function setUp()
    {
        parent::setUp();
        $this->maritalStatusRepo = \App::make(MaritalStatusRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMaritalStatus()
    {
        $maritalStatus = $this->fakeMaritalStatusData();
        $createdMaritalStatus = $this->maritalStatusRepo->create($maritalStatus);
        $createdMaritalStatus = $createdMaritalStatus->toArray();
        $this->assertArrayHasKey('id', $createdMaritalStatus);
        $this->assertNotNull($createdMaritalStatus['id'], 'Created MaritalStatus must have id specified');
        $this->assertNotNull(MaritalStatus::find($createdMaritalStatus['id']), 'MaritalStatus with given id must be in DB');
        $this->assertModelData($maritalStatus, $createdMaritalStatus);
    }

    /**
     * @test read
     */
    public function testReadMaritalStatus()
    {
        $maritalStatus = $this->makeMaritalStatus();
        $dbMaritalStatus = $this->maritalStatusRepo->find($maritalStatus->id);
        $dbMaritalStatus = $dbMaritalStatus->toArray();
        $this->assertModelData($maritalStatus->toArray(), $dbMaritalStatus);
    }

    /**
     * @test update
     */
    public function testUpdateMaritalStatus()
    {
        $maritalStatus = $this->makeMaritalStatus();
        $fakeMaritalStatus = $this->fakeMaritalStatusData();
        $updatedMaritalStatus = $this->maritalStatusRepo->update($fakeMaritalStatus, $maritalStatus->id);
        $this->assertModelData($fakeMaritalStatus, $updatedMaritalStatus->toArray());
        $dbMaritalStatus = $this->maritalStatusRepo->find($maritalStatus->id);
        $this->assertModelData($fakeMaritalStatus, $dbMaritalStatus->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMaritalStatus()
    {
        $maritalStatus = $this->makeMaritalStatus();
        $resp = $this->maritalStatusRepo->delete($maritalStatus->id);
        $this->assertTrue($resp);
        $this->assertNull(MaritalStatus::find($maritalStatus->id), 'MaritalStatus should not exist in DB');
    }
}
