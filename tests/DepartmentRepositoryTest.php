<?php

use App\Models\Department;
use App\Repositories\DepartmentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DepartmentRepositoryTest extends TestCase
{
    use MakeDepartmentTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DepartmentRepository
     */
    protected $departmentRepo;

    public function setUp()
    {
        parent::setUp();
        $this->departmentRepo = App::make(DepartmentRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDepartment()
    {
        $department = $this->fakeDepartmentData();
        $createdDepartment = $this->departmentRepo->create($department);
        $createdDepartment = $createdDepartment->toArray();
        $this->assertArrayHasKey('id', $createdDepartment);
        $this->assertNotNull($createdDepartment['id'], 'Created Department must have id specified');
        $this->assertNotNull(Department::find($createdDepartment['id']), 'Department with given id must be in DB');
        $this->assertModelData($department, $createdDepartment);
    }

    /**
     * @test read
     */
    public function testReadDepartment()
    {
        $department = $this->makeDepartment();
        $dbDepartment = $this->departmentRepo->find($department->id);
        $dbDepartment = $dbDepartment->toArray();
        $this->assertModelData($department->toArray(), $dbDepartment);
    }

    /**
     * @test update
     */
    public function testUpdateDepartment()
    {
        $department = $this->makeDepartment();
        $fakeDepartment = $this->fakeDepartmentData();
        $updatedDepartment = $this->departmentRepo->update($fakeDepartment, $department->id);
        $this->assertModelData($fakeDepartment, $updatedDepartment->toArray());
        $dbDepartment = $this->departmentRepo->find($department->id);
        $this->assertModelData($fakeDepartment, $dbDepartment->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDepartment()
    {
        $department = $this->makeDepartment();
        $resp = $this->departmentRepo->delete($department->id);
        $this->assertTrue($resp);
        $this->assertNull(Department::find($department->id), 'Department should not exist in DB');
    }
}
