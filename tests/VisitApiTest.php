<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitApiTest extends TestCase
{
    use MakeVisitTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVisit()
    {
        $visit = $this->fakeVisitData();
        $this->json('POST', '/api/v1/visits', $visit);

        $this->assertApiResponse($visit);
    }

    /**
     * @test
     */
    public function testReadVisit()
    {
        $visit = $this->makeVisit();
        $this->json('GET', '/api/v1/visits/'.$visit->id);

        $this->assertApiResponse($visit->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVisit()
    {
        $visit = $this->makeVisit();
        $editedVisit = $this->fakeVisitData();

        $this->json('PUT', '/api/v1/visits/'.$visit->id, $editedVisit);

        $this->assertApiResponse($editedVisit);
    }

    /**
     * @test
     */
    public function testDeleteVisit()
    {
        $visit = $this->makeVisit();
        $this->json('DELETE', '/api/v1/visits/'.$visit->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/visits/'.$visit->id);

        $this->assertResponseStatus(404);
    }
}
