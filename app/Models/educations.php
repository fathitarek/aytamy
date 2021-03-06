<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class educations
 * @package App\Models
 * @version February 26, 2021, 6:56 pm UTC
 *
 * @property string $name_en
 * @property string $name_ar
 */
class educations extends Model
{

    public $table = 'educations';
    



    public $fillable = [
        'name_en',
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
        'name_en' => 'required',
        'name_ar' => 'required'
    ];

    
}
