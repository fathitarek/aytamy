<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class nationalities
 * @package App\Models
 * @version February 26, 2021, 4:38 pm UTC
 *
 * @property string $name_en
 * @property string $name_ar
 */
class nationalities extends Model
{

    public $table = 'nationalities';
    



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
        'name_en' => 'required|unique:nationalities',
        'name_ar' => 'required|unique:nationalities'
    ];

    public static $rulesUpdate = [
        'name_en' => 'required',
        'name_ar' => 'required'
    ];   
}
