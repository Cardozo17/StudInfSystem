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

    protected $fillable= [
    
     'id',       
     'height',
     'weight',
     'born_place',
     'born_date',
     'pedagogical_difficulties',
     'diseases_affecting', 
     'afters_school_activities',
     'status',
     'teacher_id',
     'relationship_with_legal_representative',
     'parent_id',
     'legal_representative_id',
     'grade_to_be_register'
     
     ];

    //protected $guarded= ['id'];

       public function person()
    {
        return $this->hasOne('App\Person', 'id');
    }

     public function legalRepresentative()
    {
        return $this->belongsTo('App\LegalRepresentative');
    }

     public function parent()
    {
        return $this->belongsTo('App\Paternity');
    }

     public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }


     public function brothers()
    {
        return $this->belongsToMany('App\Student', 'brotherhood', 'student_id', 'student_id1' );
    }





}
