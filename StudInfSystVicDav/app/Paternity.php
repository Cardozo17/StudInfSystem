<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paternity extends Model
{
    protected $table = 'parent';
    public $timestamps = false;

     protected $fillable= [
     
     'id',
     'work_address',
     'marital_status',
     'instruction_grade',
     'craft_profession',
     'live_with_the_student'

     ];

    public function person()
    {
        return $this->hasOne('App\Person', 'id');
    }

    public function students()
    {
        return $this->hasMany('App\Student', 'parent_id');
    }
}
