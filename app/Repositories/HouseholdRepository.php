<?php

namespace App\Repositories;

use App\Models\Household;
use InfyOm\Generator\Common\BaseRepository;

class HouseholdRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'last_name',
        'people',
        'home_phone',
        'department',
        'connected',
        'plan_to_visit',
        'interested_in',
        'family_notes',
        'first_contacted',
        'point_of_contact',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'user',
        'visits'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Household::class;
    }
}
