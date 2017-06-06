<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     * Project Name
Description
Purpose of project (rescue, food, health, housing, cleaning (water wells)
Address
Project leaders name, contact number, email
Add members (Name, contact number, email of each person)
Web site if available
Project email
Geo Location
Possible locations to serve (specific areas, all island)
Resources they have (vehicles, motor boats, tents, medicin)
Other details
     */
    protected $fillable = [
        'name', 'description', 'purpose', 'address', 'project_leader', 'project_lead_contact', 'project_lead_email',
    		'members','website','email','geo_location','possible_locations','resources','other_details'
    		
    ];
}
