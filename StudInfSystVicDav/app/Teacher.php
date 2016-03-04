<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
      protected $table = 'teacher';
      public $timestamps = false;

    protected $fillable= [
     
     'id',
     'grade',

     ];  

    public function person()
    {
        return $this->hasOne('App\Person', 'id');
    }
  
    public function students()
    {
        return $this->hasMany('App\Student', 'teacher_id');
    }


}
