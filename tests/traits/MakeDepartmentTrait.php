<?php
namespace Tests;

use Faker\Factory as Faker;
use App\Models\Department;
use App\Repositories\DepartmentRepository;

trait MakeDepartmentTrait
{
    /**
     * Create fake instance of Department and save it in database
     *
     * @param array $departmentFields
     * @return Department
     */
    public function makeDepartment($departmentFields = [])
    {
        /** @var DepartmentRepository $departmentRepo */
        $departmentRepo = App::make(DepartmentRepository::class);
        $theme = $this->fakeDepartmentData($departmentFields);
        return $departmentRepo->create($theme);
    }

    /**
     * Get fake instance of Department
     *
     * @param array $departmentFields
     * @return Department
     */
    public function fakeDepartment($departmentFields = [])
    {
        return new Department($this->fakeDepartmentData($departmentFields));
    }

    /**
     * Get fake data of Department
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDepartmentData($departmentFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $departmentFields);
    }
}
