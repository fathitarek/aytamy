<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class notifications
 * @package App\Models
 * @version April 6, 2021, 11:21 am UTC
 *
 * @property string $title
 * @property string $body
 * @property integer $customer_id
 * @property string $lang
 */
class notifications extends Model
{

    public $table = 'notifications';
    



    public $fillable = [
        'title',
        'body',
        'customer_id',
        'lang'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'body' => 'string',
        'customer_id' => 'integer',
        'lang' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'body' => 'required',
        'customer_id' => 'required',
        'lang' => 'required'
    ];

    
}
