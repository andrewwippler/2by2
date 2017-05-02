<?php

use Tests\TestCase;
use Tests\Traits\MakeHouseholdTrait;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HouseholdApiTest extends TestCase
{
    use MakeHouseholdTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @var HouseholdRepository
     */
    public function setUp()
    {
        parent::setUp();

    }

    /**
     * @test
     */
    public function testCreateHousehold()
    {
        $household = factory(App\Models\Household::class)->make();

        $response = $this->json('POST', '/api/v1/households', $household->toArray());

        $response->assertStatus(200);

        $response = $this->json('GET', '/api/v1/households/'.$household->id);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testUpdateHousehold()
    {
        $household = factory(App\Models\Household::class)->make();
        $editedHousehold = factory(App\Models\Household::class)->make();

        $response = $this->json('POST', '/api/v1/households', $household->toArray());
        $response = $this->json('PUT', '/api/v1/households/'.$household->id, $editedHousehold->toArray());

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testDeleteHousehold()
    {
        $household = factory(App\Models\Household::class)->make();
        $response = $this->json('DELETE', '/api/v1/households/'.$household->id);

        $response->assertStatus(200);
        $response = $this->json('GET', '/api/v1/households/'.$household->id);

        $response->assertStatus(404);
    }
}
