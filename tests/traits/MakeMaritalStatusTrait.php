<?php
namespace Tests;

use Faker\Factory as Faker;
use App\Models\MaritalStatus;
use App\Repositories\MaritalStatusRepository;

trait MakeMaritalStatusTrait
{
    /**
     * Create fake instance of MaritalStatus and save it in database
     *
     * @param array $maritalStatusFields
     * @return MaritalStatus
     */
    public function makeMaritalStatus($maritalStatusFields = [])
    {
        /** @var MaritalStatusRepository $maritalStatusRepo */
        $maritalStatusRepo = App::make(MaritalStatusRepository::class);
        $theme = $this->fakeMaritalStatusData($maritalStatusFields);
        return $maritalStatusRepo->create($theme);
    }

    /**
     * Get fake instance of MaritalStatus
     *
     * @param array $maritalStatusFields
     * @return MaritalStatus
     */
    public function fakeMaritalStatus($maritalStatusFields = [])
    {
        return new MaritalStatus($this->fakeMaritalStatusData($maritalStatusFields));
    }

    /**
     * Get fake data of MaritalStatus
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMaritalStatusData($maritalStatusFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $maritalStatusFields);
    }
}
