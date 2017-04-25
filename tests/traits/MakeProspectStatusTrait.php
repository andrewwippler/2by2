<?php

use Faker\Factory as Faker;
use App\Models\ProspectStatus;
use App\Repositories\ProspectStatusRepository;

trait MakeProspectStatusTrait
{
    /**
     * Create fake instance of ProspectStatus and save it in database
     *
     * @param array $prospectStatusFields
     * @return ProspectStatus
     */
    public function makeProspectStatus($prospectStatusFields = [])
    {
        /** @var ProspectStatusRepository $prospectStatusRepo */
        $prospectStatusRepo = App::make(ProspectStatusRepository::class);
        $theme = $this->fakeProspectStatusData($prospectStatusFields);
        return $prospectStatusRepo->create($theme);
    }

    /**
     * Get fake instance of ProspectStatus
     *
     * @param array $prospectStatusFields
     * @return ProspectStatus
     */
    public function fakeProspectStatus($prospectStatusFields = [])
    {
        return new ProspectStatus($this->fakeProspectStatusData($prospectStatusFields));
    }

    /**
     * Get fake data of ProspectStatus
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProspectStatusData($prospectStatusFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $prospectStatusFields);
    }
}
