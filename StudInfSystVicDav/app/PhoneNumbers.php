<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumbers extends Model
{
     protected $table = 'phone_numbers';
     public $timestamps = false;

       public function person()
    {
        return $this->hasOne('App\Person', 'phone_numbers_id');
    }

}
