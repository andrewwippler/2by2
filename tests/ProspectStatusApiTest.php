<?php

use Tests\TestCase;
use Tests\Traits\MakeProspectStatusTrait;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProspectStatusApiTest extends TestCase
{
    use MakeProspectStatusTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProspectStatus()
    {
        $prospectStatus = $this->fakeProspectStatusData();
        $response = $this->json('POST', '/api/v1/prospectstatuses', $prospectStatus);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testReadProspectStatus()
    {
        $prospectStatus = $this->makeProspectStatus();
        $response = $this->json('GET', '/api/v1/prospectstatuses/'.$prospectStatus->id);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testUpdateProspectStatus()
    {
        $prospectStatus = $this->makeProspectStatus();
        $editedProspectStatus = $this->fakeProspectStatusData();

        $response = $this->json('PUT', '/api/v1/prospectstatuses/'.$prospectStatus->id, $editedProspectStatus);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testDeleteProspectStatus()
    {
        $prospectStatus = $this->makeProspectStatus();
        $response = $this->json('DELETE', '/api/v1/prospectstatuses/'.$prospectStatus->id);

        $response->assertStatus(200);
        $response = $this->json('GET', '/api/v1/prospectstatuses/'.$prospectStatus->id);

        $response->assertStatus(404);
    }
}
