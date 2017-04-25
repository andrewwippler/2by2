<?php

use App\Models\Visit;
use App\Repositories\VisitRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitRepositoryTest extends TestCase
{
    use MakeVisitTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VisitRepository
     */
    protected $visitRepo;

    public function setUp()
    {
        parent::setUp();
        $this->visitRepo = App::make(VisitRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVisit()
    {
        $visit = $this->fakeVisitData();
        $createdVisit = $this->visitRepo->create($visit);
        $createdVisit = $createdVisit->toArray();
        $this->assertArrayHasKey('id', $createdVisit);
        $this->assertNotNull($createdVisit['id'], 'Created Visit must have id specified');
        $this->assertNotNull(Visit::find($createdVisit['id']), 'Visit with given id must be in DB');
        $this->assertModelData($visit, $createdVisit);
    }

    /**
     * @test read
     */
    public function testReadVisit()
    {
        $visit = $this->makeVisit();
        $dbVisit = $this->visitRepo->find($visit->id);
        $dbVisit = $dbVisit->toArray();
        $this->assertModelData($visit->toArray(), $dbVisit);
    }

    /**
     * @test update
     */
    public function testUpdateVisit()
    {
        $visit = $this->makeVisit();
        $fakeVisit = $this->fakeVisitData();
        $updatedVisit = $this->visitRepo->update($fakeVisit, $visit->id);
        $this->assertModelData($fakeVisit, $updatedVisit->toArray());
        $dbVisit = $this->visitRepo->find($visit->id);
        $this->assertModelData($fakeVisit, $dbVisit->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVisit()
    {
        $visit = $this->makeVisit();
        $resp = $this->visitRepo->delete($visit->id);
        $this->assertTrue($resp);
        $this->assertNull(Visit::find($visit->id), 'Visit should not exist in DB');
    }
}
