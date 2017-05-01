<?php
namespace Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProspectStatusApiTest extends TestCase
{
    use MakeProspectStatusTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProspectStatus()
    {
        $prospectStatus = $this->fakeProspectStatusData();
        $this->json('POST', '/api/v1/prospectStatuses', $prospectStatus);

        $this->assertApiResponse($prospectStatus);
    }

    /**
     * @test
     */
    public function testReadProspectStatus()
    {
        $prospectStatus = $this->makeProspectStatus();
        $this->json('GET', '/api/v1/prospectStatuses/'.$prospectStatus->id);

        $this->assertApiResponse($prospectStatus->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProspectStatus()
    {
        $prospectStatus = $this->makeProspectStatus();
        $editedProspectStatus = $this->fakeProspectStatusData();

        $this->json('PUT', '/api/v1/prospectStatuses/'.$prospectStatus->id, $editedProspectStatus);

        $this->assertApiResponse($editedProspectStatus);
    }

    /**
     * @test
     */
    public function testDeleteProspectStatus()
    {
        $prospectStatus = $this->makeProspectStatus();
        $this->json('DELETE', '/api/v1/prospectStatuses/'.$prospectStatus->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/prospectStatuses/'.$prospectStatus->id);

        $this->assertResponseStatus(404);
    }
}
