<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paternity extends Model
{
    protected $table = 'parent';
    public $timestamps = false;

     public function person()
    {
        return $this->hasOne('App\Person', 'id');
    }

     public function students()
    {
        return $this->hasMany('App\Student', 'parent_id');
    }
}
