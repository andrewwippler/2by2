<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DepartmentApiTest extends TestCase
{
    use MakeDepartmentTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDepartment()
    {
        $department = $this->fakeDepartmentData();
        $this->json('POST', '/api/v1/departments', $department);

        $this->assertApiResponse($department);
    }

    /**
     * @test
     */
    public function testReadDepartment()
    {
        $department = $this->makeDepartment();
        $this->json('GET', '/api/v1/departments/'.$department->id);

        $this->assertApiResponse($department->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDepartment()
    {
        $department = $this->makeDepartment();
        $editedDepartment = $this->fakeDepartmentData();

        $this->json('PUT', '/api/v1/departments/'.$department->id, $editedDepartment);

        $this->assertApiResponse($editedDepartment);
    }

    /**
     * @test
     */
    public function testDeleteDepartment()
    {
        $department = $this->makeDepartment();
        $this->json('DELETE', '/api/v1/departments/'.$department->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/departments/'.$department->id);

        $this->assertResponseStatus(404);
    }
}
