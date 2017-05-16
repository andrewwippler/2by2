<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class Household
 * @package App\Models
 * @version April 24, 2017, 11:59 pm UTC
 */
class Household extends Model
{
    use SoftDeletes;

    public $table = 'households';

    protected $dates = [
        'deleted_at',
        'first_contacted',
        'plan_to_visit',
    ];


    public $fillable = [
        'last_name',
        'home_phone',
        'department',
        'connected',
        'plan_to_visit',
        'interested_in',
        'family_notes',
        'first_contacted',
        'point_of_contact',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'user',
        'visits',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'last_name' => 'string',
        'home_phone' => 'string',
        'department' => 'integer',
        'connected' => 'boolean',
        'interested_in' => 'string',
        'family_notes' => 'string',
        'point_of_contact' => 'string',
        'address1' => 'string',
        'address2' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zip' => 'integer',
        'user' => 'integer',
        'visits' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'last_name' => 'required',
        'user' => 'required'
    ];

    /**
     * Format date
     */
    public function setFirstContactedAttribute($date)
    {
        return $this->attributes['first_contacted'] = ($date != '')?
                Carbon::parse($date): null;
    }

    /**
    * Format date
    */
    public function setPlanToVisitAttribute($date)
    {
        return $this->attributes['plan_to_visit'] = ($date != '')?
                Carbon::parse($date): null;
    }

    /**
    * Format date
    */
    public function getFirstContactedAttribute($date)
    {
        return ($date != null) ? Carbon::parse($date)->toDateString() : null;
    }

    /**
    * Format date
    */
    public function getPlanToVisitAttribute($date)
    {
        return ($date != null) ? Carbon::parse($date)->toDateString() : null;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function people()
    {
        return $this->hasMany(\App\Models\Person::class, 'household_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function department()
    {
        return $this->hasOne(\App\Models\Department::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function visits()
    {
        return $this->hasMany(\App\Models\Visit::class, 'household_id');
    }
}
