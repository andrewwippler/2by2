<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MaritalStatus
 * @package App\Models
 * @version April 24, 2017, 9:28 pm UTC
 */
class MaritalStatus extends Model
{
    use SoftDeletes;

    public $table = 'marital_statuses';


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
