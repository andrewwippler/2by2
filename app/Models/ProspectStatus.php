<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProspectStatus
 * @package App\Models
 * @version April 24, 2017, 11:58 pm UTC
 */
class ProspectStatus extends Model
{
    use SoftDeletes;

    public $table = 'prospect_statuses';


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
        'id' => 'integer',
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


}
