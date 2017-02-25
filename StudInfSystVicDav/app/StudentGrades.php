<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGrades extends Model
{
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_grades';

     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable= [

     'id',
     'period',
     'value',
     'student_id',
     ];

     public function student()
    {
        return $this->belongsTo('App\Student');
    }

}
