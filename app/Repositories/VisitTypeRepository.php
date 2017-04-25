<?php

namespace App\Repositories;

use App\Models\VisitType;
use InfyOm\Generator\Common\BaseRepository;

class VisitTypeRepository extends BaseRepository
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
        return VisitType::class;
    }
}
