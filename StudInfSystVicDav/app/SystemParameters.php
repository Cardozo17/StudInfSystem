<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemParameters extends Model
{
		protected $table = 'system_parameters';
		public $timestamps = false;

		protected $fillable= ['id','school_name', 'school_principal', 'school_mission', 'school_vision', 'school_address', 'school_logo', 'school_phone', 'school_email' ];
}
