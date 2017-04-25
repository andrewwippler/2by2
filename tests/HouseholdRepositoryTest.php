<?php

namespace Tests;

use App\Models\Household;
use App\Repositories\HouseholdRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HouseholdRepositoryTest extends TestCase
{
    use MakeHouseholdTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var HouseholdRepository
     */
    protected $householdRepo;

    public function setUp()
    {
        parent::setUp();
        $this->householdRepo = App::make(HouseholdRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateHousehold()
    {
        $household = $this->fakeHouseholdData();
        $createdHousehold = $this->householdRepo->create($household);
        $createdHousehold = $createdHousehold->toArray();
        $this->assertArrayHasKey('id', $createdHousehold);
        $this->assertNotNull($createdHousehold['id'], 'Created Household must have id specified');
        $this->assertNotNull(Household::find($createdHousehold['id']), 'Household with given id must be in DB');
        $this->assertModelData($household, $createdHousehold);
    }

    /**
     * @test read
     */
    public function testReadHousehold()
    {
        $household = $this->makeHousehold();
        $dbHousehold = $this->householdRepo->find($household->id);
        $dbHousehold = $dbHousehold->toArray();
        $this->assertModelData($household->toArray(), $dbHousehold);
    }

    /**
     * @test update
     */
    public function testUpdateHousehold()
    {
        $household = $this->makeHousehold();
        $fakeHousehold = $this->fakeHouseholdData();
        $updatedHousehold = $this->householdRepo->update($fakeHousehold, $household->id);
        $this->assertModelData($fakeHousehold, $updatedHousehold->toArray());
        $dbHousehold = $this->householdRepo->find($household->id);
        $this->assertModelData($fakeHousehold, $dbHousehold->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteHousehold()
    {
        $household = $this->makeHousehold();
        $resp = $this->householdRepo->delete($household->id);
        $this->assertTrue($resp);
        $this->assertNull(Household::find($household->id), 'Household should not exist in DB');
    }
}
