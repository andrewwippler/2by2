<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VisitType
 * @package App\Models
 * @version April 24, 2017, 11:59 pm UTC
 */
class VisitType extends Model
{
    use SoftDeletes;

    public $table = 'visit_types';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'position',
        'color',
        'icon',
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
        'color' => 'required',
        'icon' => 'required',
    ];


}
