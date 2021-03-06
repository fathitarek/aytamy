<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class jobs
 * @package App\Models
 * @version February 26, 2021, 4:32 pm UTC
 *
 * @property string $name_en
 * @property href="{{ $<a
 * @property string $name_ar
 */
class jobs extends Model
{

    public $table = 'jobs';
    



    public $fillable = [
        'name_en',
        '<a',
        'name_ar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name_en' => 'string',
        'name_ar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_en' =>'required|unique:jobs',
        'name_ar' => 'required|unique:jobs'
    ];

    
}
