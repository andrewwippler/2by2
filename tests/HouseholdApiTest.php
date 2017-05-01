<?php

use Tests\TestCase;
use Tests\Traits\MakeHouseholdTrait;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HouseholdApiTest extends TestCase
{
    use MakeHouseholdTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateHousehold()
    {
        $household = $this->fakeHouseholdData();
        $response = $this->json('POST', '/api/v1/households', $household);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testReadHousehold()
    {
        $household = $this->makeHousehold();
        $response = $this->json('GET', '/api/v1/households/'.$household->id);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testUpdateHousehold()
    {
        $household = $this->makeHousehold();
        $editedHousehold = $this->fakeHouseholdData();

        $response = $this->json('PUT', '/api/v1/households/'.$household->id, $editedHousehold);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testDeleteHousehold()
    {
        $household = $this->makeHousehold();
        $response = $this->json('DELETE', '/api/v1/households/'.$household->id);

        $response->assertStatus(200);
        $response = $this->json('GET', '/api/v1/households/'.$household->id);

        $response->assertStatus(404);
    }
}
