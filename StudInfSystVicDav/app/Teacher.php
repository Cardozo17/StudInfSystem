<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
      protected $table = 'teacher';
      public $timestamps = false;

    protected $fillable= [

     'id',
     'teacher_code',

     ];

    public function person()
    {
        return $this->hasOne('App\Person', 'id');
    }

     public function gradeSection()
    {
        return $this->hasOne('App\GradeSection', 'teacher_id');
    }

}
