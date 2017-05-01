<?php
namespace Tests;

use Faker\Factory as Faker;
use App\Models\Household;
use App\Repositories\HouseholdRepository;

trait MakeHouseholdTrait
{
    /**
     * Create fake instance of Household and save it in database
     *
     * @param array $householdFields
     * @return Household
     */
    public function makeHousehold($householdFields = [])
    {
        /** @var HouseholdRepository $householdRepo */
        $householdRepo = App::make(HouseholdRepository::class);
        $theme = $this->fakeHouseholdData($householdFields);
        return $householdRepo->create($theme);
    }

    /**
     * Get fake instance of Household
     *
     * @param array $householdFields
     * @return Household
     */
    public function fakeHousehold($householdFields = [])
    {
        return new Household($this->fakeHouseholdData($householdFields));
    }

    /**
     * Get fake data of Household
     *
     * @param array $postFields
     * @return array
     */
    public function fakeHouseholdData($householdFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'last_name' => $fake->word,
            'people' => $fake->randomDigitNotNull,
            'home_phone' => $fake->word,
            'department' => $fake->randomDigitNotNull,
            'connected' => $fake->word,
            'plan_to_visit' => $fake->date('Y-m-d H:i:s'),
            'interested_in' => $fake->word,
            'family_notes' => $fake->text,
            'first_contacted' => $fake->date('Y-m-d H:i:s'),
            'point_of_contact' => $fake->word,
            'address1' => $fake->word,
            'address2' => $fake->word,
            'city' => $fake->word,
            'state' => $fake->word,
            'zip' => $fake->randomDigitNotNull,
            'user' => $fake->randomDigitNotNull,
            'visits' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $householdFields);
    }
}
