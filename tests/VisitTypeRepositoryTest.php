<?php
namespace Tests;

use App\Models\VisitType;
use App\Repositories\VisitTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitTypeRepositoryTest extends TestCase
{
    use MakeVisitTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VisitTypeRepository
     */
    protected $visitTypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->visitTypeRepo = App::make(VisitTypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVisitType()
    {
        $visitType = $this->fakeVisitTypeData();
        $createdVisitType = $this->visitTypeRepo->create($visitType);
        $createdVisitType = $createdVisitType->toArray();
        $this->assertArrayHasKey('id', $createdVisitType);
        $this->assertNotNull($createdVisitType['id'], 'Created VisitType must have id specified');
        $this->assertNotNull(VisitType::find($createdVisitType['id']), 'VisitType with given id must be in DB');
        $this->assertModelData($visitType, $createdVisitType);
    }

    /**
     * @test read
     */
    public function testReadVisitType()
    {
        $visitType = $this->makeVisitType();
        $dbVisitType = $this->visitTypeRepo->find($visitType->id);
        $dbVisitType = $dbVisitType->toArray();
        $this->assertModelData($visitType->toArray(), $dbVisitType);
    }

    /**
     * @test update
     */
    public function testUpdateVisitType()
    {
        $visitType = $this->makeVisitType();
        $fakeVisitType = $this->fakeVisitTypeData();
        $updatedVisitType = $this->visitTypeRepo->update($fakeVisitType, $visitType->id);
        $this->assertModelData($fakeVisitType, $updatedVisitType->toArray());
        $dbVisitType = $this->visitTypeRepo->find($visitType->id);
        $this->assertModelData($fakeVisitType, $dbVisitType->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVisitType()
    {
        $visitType = $this->makeVisitType();
        $resp = $this->visitTypeRepo->delete($visitType->id);
        $this->assertTrue($resp);
        $this->assertNull(VisitType::find($visitType->id), 'VisitType should not exist in DB');
    }
}
