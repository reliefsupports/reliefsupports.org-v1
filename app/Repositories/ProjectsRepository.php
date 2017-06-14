<?php
/**
 * Created by eclipse.
 * User: ravithb
 * Date: 6/4/17
 * Time: 10:32 PM
 */

namespace App\Repositories;

use App\Project;
use App\Repositories\Contracts\ProjectsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\ProjectMember;
use App\ProjectResource;

class ProjectsRepository implements ProjectsInterface
{
    /**
     * Add project
     *
     * @param $input
     * @return bool
     */
    public function addProject($input)
    {
        try {
            return Project::create($input);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        } 
    }
    
    public function addMember($input)
    {
    	try {
    		return ProjectMember::create($input);
    	} catch (\Exception $e) {
    		Log::error($e->getMessage());
    		return false;
    	}
    }
    
    public function addResource($input)
    {
    	try {
    		return ProjectResource::create($input);
    	} catch (\Exception $e) {
    		Log::error($e->getMessage());
    		return false;
    	}
    }
    
    public function deleteMember($member_id)
    {
    	return ProjectMember::where('id', '=', $member_id)->delete();
    }
    
    public function deleteProjectResource($resource_id,$project_id)
    {
    	return ProjectResource::where('resource_id', '=', $resource_id)
    	->where('project_id','=',$project_id)
    	->delete();
    }
    
    public function getMember($member_id)
    {
    	return ProjectMember::find($member_id);
    }
    
    public function getProjectResource($resource_id,$project_id)
    {
    	return ProjectResource::select('project_resources.*','resources.name','resources.type')
    	->join('resources','resources.id','project_resources.resource_id')
    	->where('resource_id','=',$resource_id)
    	->where('project_id','=',$project_id)
    	->first();
    }
    
    public function getMemberSummary($project_id)
    {
    	return ProjectMember::select('id','type','first_name','last_name','address','contacts','email','location')->orderBy('type','asc')->get();
    }
    
    public function getResourceSummary($project_id)
    {
    	return ProjectResource::join('resources','resources.id','project_resources.resource_id')->orderBy('resources.type','asc')->get();
    }
    

    /**
     * Get all projects
     *
     * @param $limit
     * @return bool
     */
    public function getProjects($limit = null)
    {
        try {
            if ($limit) {
                return Project::orderBy('id', 'desc')->take($limit)->get();
            }
            return Project::orderBy('id', 'desc')->paginate(10);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        } 
    }

    /**
     * Find project
     *
     * @param $id
     * @return bool
     */
    public function findProject($id)
    {
        try {
            return Project::find($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        } 
    }
    
    
}
