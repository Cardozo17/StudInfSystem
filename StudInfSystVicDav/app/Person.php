<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
     protected $table = 'person';
     public $timestamps = false;


     protected $fillable= [

     'document_id',
     'name',
     'last_name',
     'gender',
     'email'

     ];


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


    public function parent()
    {
        return $this->belongsTo('App\Paternity', 'id');
    }


    public function teacher()
    {
         return $this->belongsTo('App\Teacher', 'id');
    }

}
