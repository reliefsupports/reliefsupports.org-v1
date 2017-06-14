<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectResource extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 *
	 * Project Name
	 */
	protected $fillable = ["project_id","resource_id","quantity","availability","location",
			"geo_location","other_details"];

	public function resource(){
		return $this->belongsTo('App\Resource',"resource_id");
	}
}