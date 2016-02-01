<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
     protected $table = 'person';
     public $timestamps = false;


    public function phoneNumbers()
    {
        return $this->belongsTo('App\PhoneNumbers', 'phone_numbers_id');
    }

    public function student()
    {
        return $this->belongsTo('App\Student', 'id');
    }

    public function legalRepresentative()
    {
        return $this->belongsTo('App\LegalRepresentative', 'id');
    }

 
    public function teacher()
    {
        return $this->belongsTo('App\Teacher', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Paternity', 'id');
    }

}
