<?php

namespace App\Repositories;

use App\Models\ProspectStatus;
use InfyOm\Generator\Common\BaseRepository;

class ProspectStatusRepository extends BaseRepository
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
        return ProspectStatus::class;
    }
}
