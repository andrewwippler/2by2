<?php

use Faker\Factory as Faker;
use App\Models\Person;
use App\Repositories\PersonRepository;

trait MakePersonTrait
{
    /**
     * Create fake instance of Person and save it in database
     *
     * @param array $personFields
     * @return Person
     */
    public function makePerson($personFields = [])
    {
        /** @var PersonRepository $personRepo */
        $personRepo = App::make(PersonRepository::class);
        $theme = $this->fakePersonData($personFields);
        return $personRepo->create($theme);
    }

    /**
     * Get fake instance of Person
     *
     * @param array $personFields
     * @return Person
     */
    public function fakePerson($personFields = [])
    {
        return new Person($this->fakePersonData($personFields));
    }

    /**
     * Get fake data of Person
     *
     * @param array $postFields
     * @return array
     */
    public function fakePersonData($personFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'first_name' => $fake->word,
            'middle_name' => $fake->word,
            'phone_number' => $fake->word,
            'LifeStage' => $fake->randomDigitNotNull,
            'email' => $fake->word,
            'spiritual_condition' => $fake->randomDigitNotNull,
            'prospect_status' => $fake->randomDigitNotNull,
            'notes' => $fake->text,
            'marital_status' => $fake->randomDigitNotNull,
            'relationship' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $personFields);
    }
}
