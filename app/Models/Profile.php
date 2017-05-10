<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Profile
 * @package App\Models
 * @version May 5, 2017, 11:52 pm UTC
 */
class Profile extends Model
{
    use SoftDeletes;

    public $table = 'profiles';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'sunday_school_id',
        'user_id',
        'team_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sunday_school_id' => 'integer',
        'team_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function team()
    {
        return $this->hasOne(\App\Models\Team::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function sunday_school()
    {
        return $this->hasOne(\App\Models\SundaySchool::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }


}
