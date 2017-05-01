<?php

use Tests\TestCase;
use Tests\Traits\MakeDepartmentTrait;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DepartmentApiTest extends TestCase
{
    use MakeDepartmentTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDepartment()
    {
        $department = $this->fakeDepartmentData();
        $response = $this->json('POST', '/api/v1/departments', $department);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testReadDepartment()
    {
        $department = $this->makeDepartment();
        $response = $this->json('GET', '/api/v1/departments/'.$department->id);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testUpdateDepartment()
    {
        $department = $this->makeDepartment();
        $editedDepartment = $this->fakeDepartmentData();

        $response = $this->json('PUT', '/api/v1/departments/'.$department->id, $editedDepartment);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testDeleteDepartment()
    {
        $department = $this->makeDepartment();
        $response = $this->json('DELETE', '/api/v1/departments/'.$department->id);

        $response->assertStatus(200);
        $response = $this->json('GET', '/api/v1/departments/'.$department->id);

        $response->assertStatus(404);
    }
}
