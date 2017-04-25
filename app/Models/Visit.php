<?php

namespace App\Models;

use Eloquent as Model;
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
    

    protected $dates = ['deleted_at'];


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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function visitType()
    {
        return $this->hasOne(\App\Models\VisitType::class, 'id');
    }
}
