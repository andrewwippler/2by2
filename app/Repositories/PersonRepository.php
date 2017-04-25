<?php

namespace App\Repositories;

use App\Models\Person;
use InfyOm\Generator\Common\BaseRepository;

class PersonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'middle_name',
        'phone_number',
        'LifeStage',
        'email',
        'spiritual_condition',
        'prospect_status',
        'notes',
        'marital_status',
        'relationship'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Person::class;
    }
}
