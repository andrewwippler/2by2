<?php

use Tests\TestCase;
use Tests\Traits\MakeMaritalStatusTrait;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaritalStatusApiTest extends TestCase
{
    use MakeMaritalStatusTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMaritalStatus()
    {
        $maritalStatus = $this->fakeMaritalStatusData();
        $response = $this->json('POST', '/api/v1/maritalstatuses', $maritalStatus);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testReadMaritalStatus()
    {
        $maritalStatus = $this->makeMaritalStatus();
        $response = $this->json('GET', '/api/v1/maritalstatuses/'.$maritalStatus->id);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testUpdateMaritalStatus()
    {
        $maritalStatus = $this->makeMaritalStatus();
        $editedMaritalStatus = $this->fakeMaritalStatusData();

        $response = $this->json('PUT', '/api/v1/maritalstatuses/'.$maritalStatus->id, $editedMaritalStatus);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testDeleteMaritalStatus()
    {
        $maritalStatus = $this->makeMaritalStatus();
        $response = $this->json('DELETE', '/api/v1/maritalstatuses/'.$maritalStatus->id);

        $response->assertStatus(200);
        $response = $this->json('GET', '/api/v1/maritalstatuses/'.$maritalStatus->id);

        $response->assertStatus(404);
    }
}
