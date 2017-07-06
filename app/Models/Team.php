<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Team
 * @package App\Models
 * @version May 4, 2017, 11:49 pm UTC
 */
class Team extends Model
{
    use SoftDeletes;

    public $table = 'teams';


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
    //     return $this->belongsTo(\App\Models\Profile::class, 'team_id');
    // }

}
