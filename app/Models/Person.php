<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Person
 * @package App\Models
 * @version April 24, 2017, 11:59 pm UTC
 */
class Person extends Model
{
    use SoftDeletes;

    public $table = 'people';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'middle_name' => 'string',
        'phone_number' => 'string',
        'LifeStage' => 'integer',
        'email' => 'string',
        'spiritual_condition' => 'integer',
        'prospect_status' => 'integer',
        'notes' => 'string',
        'marital_status' => 'integer',
        'relationship' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lifeStage()
    {
        return $this->belongsTo(\App\Models\LifeStage::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function spiritualCondition()
    {
        return $this->belongsTo(\App\Models\SpiritualCondition::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function prospectStatus()
    {
        return $this->belongsTo(\App\Models\ProspectStatus::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function maritalStatus()
    {
        return $this->belongsTo(\App\Models\MaritalStatus::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function relationship()
    {
        return $this->belongsTo(\App\Models\Relationship::class, 'id');
    }
}
