<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalRepresentative extends Model
{
	protected $table = 'legal_representative';
    public $timestamps = false;

    protected $fillable= [

     'id',
     'home_address',
     'work_address'

     ];

    public function person()
    {
        return $this->hasOne('App\Person', 'id');
    }


    public function students()
    {
        return $this->hasMany('App\Student', 'legal_representative_id');
    }
}
