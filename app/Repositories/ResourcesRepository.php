<?php
/**
 * Created by eclipse.
 * User: ravithb
 * Date: 6/4/17
 * Time: 10:32 PM
 */

namespace App\Repositories;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Resource;
use App\Repositories\Contracts\ResourcesInterface;

class ResourcesRepository implements ResourcesInterface
{
    /**
     * Add resource
     *
     * @param $input
     * @return bool
     */
    public function addResource($input)
    {
        try {
            Resource::create($input);
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        } 
    }

    /**
     * Get all donations
     *
     * @param $limit
     * @return bool
     */
    public function getResources($limit = null)
    {
        try {
            if ($limit) {
                return Resource::orderBy('type', 'asc')->orderBy('name','asc')->take($limit)->get();
            }
            return Resource::orderBy('type', 'asc')->orderBy('name','asc')->paginate(10);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        } 
    }

    public function findResources($like)
    {
    	try {
    		$query = Resource::query();
    		$query = $query->where(DB::Raw('name'),"like","%$like%");
    		$query = $query->orderBy('name','asc');
    			
    		return $query->get();
    		
    	} catch (\Exception $e) {
    		Log::error($e->getMessage());
    		return false;
    	}
    }
    
    public function findResourcesAsList($like='')
    {
    	try {
    		$query = Resource::query()->select('id', 'name','type');
    		if(empty($like)==false){
    			$query = $query->where(DB::Raw('name'),"like","%$like%")
    			->orWhere(DB::Raw('type'),"like","%$like%");
    		}
    		$query = $query->orderBy('name','asc');
    		 
    		return $query->get();
    
    	} catch (\Exception $e) {
    		Log::error($e->getMessage());
    		return false;
    	}
    }
    
    public function getAllResourceTypes(){
    	try {
    		return Resource::select('type')
    		->distinct()
    		->orderBy('type','asc')
    		->pluck('type')->toArray();    	
    	} catch (\Exception $e) {
    		Log::error($e->getMessage());
    		return false;
    	}
    }
}
