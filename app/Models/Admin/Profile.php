<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Profile
 * @package App\Models
 * @version June 10, 2017, 3:39 pm UTC
 */
class Profile extends Model
{
    use SoftDeletes;

    public $table = 'profiles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'image',
        'type',
        'id_card_type',
        'id_card_number',
        'other_id_card',
        'other_id_card_number',
        'job_position',
        'address',
        'phone',
        'fax',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'image' => 'string',
        'type' => 'string',
        'id_card_type' => 'string',
        'id_card_number' => 'string',
        'other_id_card' => 'string',
        'other_id_card_number' => 'string',
        'job_position' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'fax' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
