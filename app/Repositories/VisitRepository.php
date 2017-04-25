<?php

namespace App\Repositories;

use App\Models\Visit;
use InfyOm\Generator\Common\BaseRepository;

class VisitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'notes',
        'made'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Visit::class;
    }
}
