<?php
namespace Tests\Unit;

use Tests\TestCase;
use Tests\ApiTestTrait;
use Tests\Traits\MakeSundaySchoolTrait;
use App\Models\SundaySchool;
use App\Repositories\SundaySchoolRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SundaySchoolRepositoryTest extends TestCase
{
    use MakeSundaySchoolTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SundaySchoolRepository
     */
    protected $sundaySchoolRepo;

    public function setUp()
    {
        parent::setUp();
        $this->sundaySchoolRepo = \App::make(SundaySchoolRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSundaySchool()
    {
        $sundaySchool = $this->fakeSundaySchoolData();
        $createdSundaySchool = $this->sundaySchoolRepo->create($sundaySchool);
        $createdSundaySchool = $createdSundaySchool->toArray();
        $this->assertArrayHasKey('id', $createdSundaySchool);
        $this->assertNotNull($createdSundaySchool['id'], 'Created SundaySchool must have id specified');
        $this->assertNotNull(SundaySchool::find($createdSundaySchool['id']), 'SundaySchool with given id must be in DB');
        $this->assertModelData($sundaySchool, $createdSundaySchool);
    }

    /**
     * @test read
     */
    public function testReadSundaySchool()
    {
        $sundaySchool = $this->makeSundaySchool();
        $dbSundaySchool = $this->sundaySchoolRepo->find($sundaySchool->id);
        $dbSundaySchool = $dbSundaySchool->toArray();
        $this->assertModelData($sundaySchool->toArray(), $dbSundaySchool);
    }

    /**
     * @test update
     */
    public function testUpdateSundaySchool()
    {
        $sundaySchool = $this->makeSundaySchool();
        $fakeSundaySchool = $this->fakeSundaySchoolData();
        $updatedSundaySchool = $this->sundaySchoolRepo->update($fakeSundaySchool, $sundaySchool->id);
        $this->assertModelData($fakeSundaySchool, $updatedSundaySchool->toArray());
        $dbSundaySchool = $this->sundaySchoolRepo->find($sundaySchool->id);
        $this->assertModelData($fakeSundaySchool, $dbSundaySchool->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSundaySchool()
    {
        $sundaySchool = $this->makeSundaySchool();
        $resp = $this->sundaySchoolRepo->delete($sundaySchool->id);
        $this->assertTrue($resp);
        $this->assertNull(SundaySchool::find($sundaySchool->id), 'SundaySchool should not exist in DB');
    }
}
