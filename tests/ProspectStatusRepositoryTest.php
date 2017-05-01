<?php

use Tests\TestCase;
use Tests\ApiTestTrait;
use Tests\Traits\MakeProspectStatusTrait;
use App\Models\ProspectStatus;
use App\Repositories\ProspectStatusRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProspectStatusRepositoryTest extends TestCase
{
    use MakeProspectStatusTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProspectStatusRepository
     */
    protected $prospectStatusRepo;

    public function setUp()
    {
        parent::setUp();
        $this->prospectStatusRepo = App::make(ProspectStatusRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProspectStatus()
    {
        $prospectStatus = $this->fakeProspectStatusData();
        $createdProspectStatus = $this->prospectStatusRepo->create($prospectStatus);
        $createdProspectStatus = $createdProspectStatus->toArray();
        $this->assertArrayHasKey('id', $createdProspectStatus);
        $this->assertNotNull($createdProspectStatus['id'], 'Created ProspectStatus must have id specified');
        $this->assertNotNull(ProspectStatus::find($createdProspectStatus['id']), 'ProspectStatus with given id must be in DB');
        $this->assertModelData($prospectStatus, $createdProspectStatus);
    }

    /**
     * @test read
     */
    public function testReadProspectStatus()
    {
        $prospectStatus = $this->makeProspectStatus();
        $dbProspectStatus = $this->prospectStatusRepo->find($prospectStatus->id);
        $dbProspectStatus = $dbProspectStatus->toArray();
        $this->assertModelData($prospectStatus->toArray(), $dbProspectStatus);
    }

    /**
     * @test update
     */
    public function testUpdateProspectStatus()
    {
        $prospectStatus = $this->makeProspectStatus();
        $fakeProspectStatus = $this->fakeProspectStatusData();
        $updatedProspectStatus = $this->prospectStatusRepo->update($fakeProspectStatus, $prospectStatus->id);
        $this->assertModelData($fakeProspectStatus, $updatedProspectStatus->toArray());
        $dbProspectStatus = $this->prospectStatusRepo->find($prospectStatus->id);
        $this->assertModelData($fakeProspectStatus, $dbProspectStatus->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProspectStatus()
    {
        $prospectStatus = $this->makeProspectStatus();
        $resp = $this->prospectStatusRepo->delete($prospectStatus->id);
        $this->assertTrue($resp);
        $this->assertNull(ProspectStatus::find($prospectStatus->id), 'ProspectStatus should not exist in DB');
    }
}
