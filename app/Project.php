<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProjectMember;
use App\ProjectResource;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     * Project Name
     */
    protected $fillable = [
        'name', 'description', 'purpose', 'address'
    		,'website','email','geo_location','possible_locations','other_details'
    		
    ];
    
    public function members(){
    	return $this->hasMany('App\ProjectMember');
    }
    
    public function resources(){
    	return $this->hasMany('App\ProjectResource');
    }
}
