<?php

namespace App\Models;

use Eloquent as Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Visit
 * @package App\Models
 * @version April 24, 2017, 11:59 pm UTC
 */
class Visit extends Model
{
    use SoftDeletes;

    public $table = 'visits';


    protected $dates = [
        'deleted_at',
        'made',
    ];


    public $fillable = [
        'type',
        'notes',
        'made'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'integer',
        'notes' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'notes' => 'required'
    ];

    /**
    * Format date on set
    */
    public function setMadeAttribute($date)
    {
        return $this->attributes['made'] = ($date != '')?
                Carbon::parse($date): null;
    }

    /**
    * Format date on get
    */
    public function getMadeAttribute($date)
    {
        return ($date != null) ? Carbon::parse($date)->toFormattedDateString() : null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function visitType()
    {
        return $this->hasOne(\App\Models\VisitType::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function household()
    {
        return $this->belongsTo(\App\Models\Household::class, 'household_id');
    }
}
