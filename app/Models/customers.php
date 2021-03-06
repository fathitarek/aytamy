<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class customers
 * @package App\Models
 * @version February 26, 2021, 6:53 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property string $image
 * @property integer $country_id
 * @property integer $dream_id
 * @property integer $job_id
 * @property integer $whats_app
 */
class customers extends Model
{

    public $table = 'customers';
    



    public $fillable = [
        'name',
        'email',
        'image',
        'country_id',
        'dream_id',
        'job_id',
        'city_id',
        'password',
        'education_id',
        'nationality_id',
        'date_birth',
        'personal_id',
        'mother_certificate',
        'father_certificate',
        'education_certificate',
        'whats_app',
        'parent_mobile',
        'type',
        'gender',
        'warranty',
        'description'
    ];
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'image' => 'string',
        'country_id' => 'integer',
        'dream_id' => 'integer',
        'job_id' => 'integer',
        'city_id'=>'integer',
        'password'=>'string',
        'education_id'=>'integer',
        'nationality_id'=>'integer',
        'date_birth'=>'date',
        'personal_id'=>'string',
        'mother_certificate'=>'string',
        'father_certificate'=>'string',
        'education_certificate'=>'string',
        'whats_app'=>'integer',
        'parent_mobile'=>'integer',
        'type'=>'integer',
        'gender'=>'string',
        'warranty'=>'integer',
        'description'=>'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'image' => 'image|mimes:png,jpeg,gif',
        
    ];

    public static $Updaterules = [
       // 'name' => 'required',
       // 'email' => 'required',
      //  'password' => 'required',
        'image' => 'image|mimes:png,jpeg,gif',
        
    ];

    public function country() {
        return $this->belongsTo('App\Models\countries');
    }

    public function city() {
        return $this->belongsTo('App\Models\cities');
    }
    public function job() {
        return $this->belongsTo('App\Models\jobs');
    }
    public function dream() {
        return $this->belongsTo('App\Models\dreams');
    }
    public function education() {
        return $this->belongsTo('App\Models\educations');
    }
    public function nationality() {
        return $this->belongsTo('App\Models\nationalities');
    }  
}

