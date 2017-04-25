<?php

namespace Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HouseholdApiTest extends TestCase
{
    use MakeHouseholdTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateHousehold()
    {
        $household = $this->fakeHouseholdData();
        $this->json('POST', '/api/v1/households', $household);

        $this->assertApiResponse($household);
    }

    /**
     * @test
     */
    public function testReadHousehold()
    {
        $household = $this->makeHousehold();
        $this->json('GET', '/api/v1/households/'.$household->id);

        $this->assertApiResponse($household->toArray());
    }

    /**
     * @test
     */
    public function testUpdateHousehold()
    {
        $household = $this->makeHousehold();
        $editedHousehold = $this->fakeHouseholdData();

        $this->json('PUT', '/api/v1/households/'.$household->id, $editedHousehold);

        $this->assertApiResponse($editedHousehold);
    }

    /**
     * @test
     */
    public function testDeleteHousehold()
    {
        $household = $this->makeHousehold();
        $this->json('DELETE', '/api/v1/households/'.$household->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/households/'.$household->id);

        $this->assertResponseStatus(404);
    }
}
