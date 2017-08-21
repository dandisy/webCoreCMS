<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Page
 * @package App\Models
 * @version June 10, 2017, 3:44 pm UTC
 */
class Page extends Model
{
    use SoftDeletes;

    public $table = 'pages';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'slug',
        'content',
        'tag',
        'status',
        'created_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'content' => 'string',
        'tag' => 'string',
        'status' => 'string',
        'created_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'slug' => 'required',
        'content' => 'required',
        'status' => 'required'
    ];

    
}
