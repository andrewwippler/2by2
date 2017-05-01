<?php
namespace Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitTypeApiTest extends TestCase
{
    use MakeVisitTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVisitType()
    {
        $visitType = $this->fakeVisitTypeData();
        $this->json('POST', '/api/v1/visitTypes', $visitType);

        $this->assertApiResponse($visitType);
    }

    /**
     * @test
     */
    public function testReadVisitType()
    {
        $visitType = $this->makeVisitType();
        $this->json('GET', '/api/v1/visitTypes/'.$visitType->id);

        $this->assertApiResponse($visitType->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVisitType()
    {
        $visitType = $this->makeVisitType();
        $editedVisitType = $this->fakeVisitTypeData();

        $this->json('PUT', '/api/v1/visitTypes/'.$visitType->id, $editedVisitType);

        $this->assertApiResponse($editedVisitType);
    }

    /**
     * @test
     */
    public function testDeleteVisitType()
    {
        $visitType = $this->makeVisitType();
        $this->json('DELETE', '/api/v1/visitTypes/'.$visitType->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/visitTypes/'.$visitType->id);

        $this->assertResponseStatus(404);
    }
}
