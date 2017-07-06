<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SundaySchool
 * @package App\Models
 * @version May 5, 2017, 11:32 pm UTC
 */
class SundaySchool extends Model
{
    use SoftDeletes;

    public $table = 'sunday_schools';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'position'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'position' => 'integer|min:0',
    ];

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  **/
    // public function profile()
    // {
    //     return $this->belongsTo(\App\Models\Profile::class, 'sunday_school_id');
    // }
}
