<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
     protected $table = 'person';
     public $timestamps = false;


         public function student()
    {
        return $this->belongsTo('App\Student', 'id');
    }

        public function phoneNumbers()
    {
        return $this->belongsTo('App\PhoneNumbers', 'phone_numbers_id');
    }

}
