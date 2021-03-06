<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class cities
 * @package App\Models
 * @version February 26, 2021, 6:57 pm UTC
 *
 * @property string $name_en
 * @property string $name_ar
 * @property integer $country_id
 */
class cities extends Model
{

    public $table = 'cities';
    



    public $fillable = [
        'name_en',
        'name_ar',
        'country_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name_en' => 'string',
        'name_ar' => 'string',
        'country_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_en' => 'required|unique:cities',
        'name_ar' => 'required|unique:cities',
        'country_id' => 'required'
    ];

    public function country() {
        return $this->belongsTo('App\Models\countries');
    }
}
