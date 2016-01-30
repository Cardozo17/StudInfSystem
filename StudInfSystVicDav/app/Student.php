<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student';

     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

       public function person()
    {
        return $this->hasOne('App\Person', 'id');
    }


}
