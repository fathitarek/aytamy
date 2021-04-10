<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class likes
 * @package App\Models
 * @version April 5, 2021, 11:04 am UTC
 *
 * @property integer $from
 * @property integer $to
 */
class likes extends Model
{

    public $table = 'likes';
    



    public $fillable = [
        'from',
        'to'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'from' => 'integer',
        'to' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'from' => 'required',
        'to' => 'required'
    ];

    public function customer() {
        return $this->belongsTo('App\Models\customers','from');
    }
    public function customer_to() {
        return $this->belongsTo('App\Models\customers','to');
    }
}
