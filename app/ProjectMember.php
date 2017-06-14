<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 *
	 * Project Name
	 */
	protected $fillable = ["type","first_name","last_name","email","address",
			"contacts","location","geo_location","project_id","website","skype","active_status","user_id"];
	
	public function project(){
		$this->hasOne('App\Project','project_id');
	}
}