<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class countries
 * @package App\Models
 * @version February 26, 2021, 4:20 pm UTC
 *
 * @property string $name_en
 * @property string $name_ar
 */
class countries extends Model
{

    public $table = 'countries';
    



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
        'name_en' => 'required|unique:countries',
        'name_ar' => 'required|unique:countries'
    ];
    public static $rulesUpdate = [
        'name_en' => 'required',
        'name_ar' => 'required'
    ];
    
    public function cities() {
        return $this->hasMany('App\Models\cities');
    }
}
