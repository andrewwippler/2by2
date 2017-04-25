<?php

namespace App\Repositories;

use App\Models\SpiritualCondition;
use InfyOm\Generator\Common\BaseRepository;

class SpiritualConditionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SpiritualCondition::class;
    }
}
