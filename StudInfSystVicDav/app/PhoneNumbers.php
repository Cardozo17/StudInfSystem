<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumbers extends Model
{
     protected $table = 'phone_numbers';
     public $timestamps = false;

     protected $fillable= [

     'home_phone',
     'work_phone',
     'mobile_phone',

     ];

       public function person()
    {
        return $this->hasOne('App\Person', 'phone_numbers_id');
    }

}
