<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SundaySchoolApiTest extends TestCase
{
    use MakeSundaySchoolTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSundaySchool()
    {
        $sundaySchool = $this->fakeSundaySchoolData();
        $this->json('POST', '/api/v1/sundaySchools', $sundaySchool);

        $this->assertApiResponse($sundaySchool);
    }

    /**
     * @test
     */
    public function testReadSundaySchool()
    {
        $sundaySchool = $this->makeSundaySchool();
        $this->json('GET', '/api/v1/sundaySchools/'.$sundaySchool->id);

        $this->assertApiResponse($sundaySchool->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSundaySchool()
    {
        $sundaySchool = $this->makeSundaySchool();
        $editedSundaySchool = $this->fakeSundaySchoolData();

        $this->json('PUT', '/api/v1/sundaySchools/'.$sundaySchool->id, $editedSundaySchool);

        $this->assertApiResponse($editedSundaySchool);
    }

    /**
     * @test
     */
    public function testDeleteSundaySchool()
    {
        $sundaySchool = $this->makeSundaySchool();
        $this->json('DELETE', '/api/v1/sundaySchools/'.$sundaySchool->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/sundaySchools/'.$sundaySchool->id);

        $this->assertResponseStatus(404);
    }
}
