<?php
namespace Tests\Traits;

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
        $householdRepo = \App::make(HouseholdRepository::class);
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
            'last_name' => $fake->lastName,
            'people' => [[
                'first_name' => $fake->firstName,
                'middle_name' => $fake->firstName,
                'phone_number' => $fake->tollFreePhoneNumber,
                'LifeStage' => $fake->randomDigitNotNull,
                'email' => $fake->word,
                'spiritual_condition' => $fake->randomDigitNotNull,
                'prospect_status' => $fake->randomDigitNotNull,
                'notes' => $fake->text,
                'marital_status' => $fake->randomDigitNotNull,
                'relationship' => $fake->randomDigitNotNull,
                ],],
            'home_phone' => $fake->tollFreePhoneNumber,
            'department' => $fake->randomDigitNotNull,
            'connected' => $fake->boolean,
            'plan_to_visit' => $fake->date('Y-m-d H:i:s'),
            'interested_in' => $fake->word,
            'family_notes' => $fake->text,
            'first_contacted' => $fake->date('Y-m-d H:i:s'),
            'point_of_contact' => $fake->word,
            'address1' => $fake->buildingNumber . ' ' . $fake->streetName,
            'address2' => $fake->secondaryAddress,
            'city' => $fake->city,
            'state' => $fake->stateAbbr,
            'zip' => $fake->postcode,
        ], $householdFields);
    }
}
