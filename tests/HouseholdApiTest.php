<?php

use Tests\TestCase;
use Tests\Traits\MakeHouseholdTrait;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HouseholdApiTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var HouseholdRepository
     */
    public function setUp()
    {
        parent::setUp();
        $this->household = factory(App\Models\Household::class)->create();

    }

    /**
     * @test
     */
    public function testCreateHousehold()
    {
        $response = $this->json('POST', '/api/v1/households', $this->household->toArray());
        $response->assertStatus(200);

        $response = $this->json('GET', '/api/v1/households/'.$this->household->id);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testUpdateHousehold()
    {

        $editedHousehold = factory(App\Models\Household::class)->make();

        $response = $this->json('PUT', '/api/v1/households/'.$this->household->id, $editedHousehold->toArray());

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testDeleteHousehold()
    {
        $response = $this->json('DELETE', '/api/v1/households/'.$this->household->id);

        $response->assertStatus(200);
        $response = $this->json('GET', '/api/v1/households/'.$this->household->id);

        $response->assertStatus(404);
    }
}
