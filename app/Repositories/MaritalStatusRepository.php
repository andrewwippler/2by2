<?php

namespace App\Repositories;

use App\Models\MaritalStatus;
use InfyOm\Generator\Common\BaseRepository;

class MaritalStatusRepository extends BaseRepository
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
        return MaritalStatus::class;
    }
}
