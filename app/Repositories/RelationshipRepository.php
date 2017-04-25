<?php

namespace App\Repositories;

use App\Models\Relationship;
use InfyOm\Generator\Common\BaseRepository;

class RelationshipRepository extends BaseRepository
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
        return Relationship::class;
    }
}
