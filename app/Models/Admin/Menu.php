<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Nestable\NestableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Menu
 * @package App\Models
 * @version June 10, 2017, 3:32 pm UTC
 */
class Menu extends Model
{
    use SoftDeletes;
    use NestableTrait;

    protected $parent = 'parent';

    public $table = 'menus';    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'label',
        'link',
        'parent',
        'group'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'label' => 'string',
        'link' => 'string',
        'parent' => 'integer',
        'group' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'label' => 'required',
        'link' => 'required'
    ];

    
}
