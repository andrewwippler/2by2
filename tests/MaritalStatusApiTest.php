<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaritalStatusApiTest extends TestCase
{
    use MakeMaritalStatusTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMaritalStatus()
    {
        $maritalStatus = $this->fakeMaritalStatusData();
        $this->json('POST', '/api/v1/maritalStatuses', $maritalStatus);

        $this->assertApiResponse($maritalStatus);
    }

    /**
     * @test
     */
    public function testReadMaritalStatus()
    {
        $maritalStatus = $this->makeMaritalStatus();
        $this->json('GET', '/api/v1/maritalStatuses/'.$maritalStatus->id);

        $this->assertApiResponse($maritalStatus->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMaritalStatus()
    {
        $maritalStatus = $this->makeMaritalStatus();
        $editedMaritalStatus = $this->fakeMaritalStatusData();

        $this->json('PUT', '/api/v1/maritalStatuses/'.$maritalStatus->id, $editedMaritalStatus);

        $this->assertApiResponse($editedMaritalStatus);
    }

    /**
     * @test
     */
    public function testDeleteMaritalStatus()
    {
        $maritalStatus = $this->makeMaritalStatus();
        $this->json('DELETE', '/api/v1/maritalStatuses/'.$maritalStatus->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/maritalStatuses/'.$maritalStatus->id);

        $this->assertResponseStatus(404);
    }
}
