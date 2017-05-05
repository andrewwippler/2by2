<?php

namespace App\Repositories;

use App\Models\SundaySchool;
use InfyOm\Generator\Common\BaseRepository;

class SundaySchoolRepository extends BaseRepository
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
        return SundaySchool::class;
    }
}
