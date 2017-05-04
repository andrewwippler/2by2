<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Household;
use App\Repositories\HouseholdRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HouseholdRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->household = factory(\App\Models\Household::class)->make();
    }

    /**
     * @test create
     */
    public function testCreateAndReadHousehold()
    {

        $this->assertArrayHasKey('id', $this->household);
        $this->assertNotNull($this->household->id, 'Created Household must have id specified');
        $this->assertInstanceOf(Household::class,$this->household);

    }

    /**
     * @test update
     */
    public function testUpdateHousehold()
    {
        $fakeHousehold = factory(\App\Models\Household::class)->make();
        $this->household->fill(['last_name' => $fakeHousehold->last_name, 'user' => 1])->save();

        $this->assertEquals($this->household->last_name, $fakeHousehold->last_name);
    }

    /**
     * @test delete
     */
    public function testDeleteHousehold()
    {
        $resp = $this->household->delete();
        $this->assertNull(Household::find($this->household->id), 'Household should not exist in DB');
    }
}
