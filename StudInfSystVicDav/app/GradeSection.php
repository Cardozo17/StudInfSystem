<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeSection extends Model
{
    protected $table = 'grade_section';
    public $timestamps = false;

     protected $fillable= [
     'id',
     'grade',
     'section_letter',
     'shift',
     'teacher_id'
     ];

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function students()
    {
        return $this->hasMany('App\Student', 'grade_section_id');
    }

}
