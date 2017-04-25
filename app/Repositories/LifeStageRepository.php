<?php

namespace App\Repositories;

use App\Models\LifeStage;
use InfyOm\Generator\Common\BaseRepository;

class LifeStageRepository extends BaseRepository
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
        return LifeStage::class;
    }
}
