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

class ProjectsRepository implements ProjectsInterface
{
    /**
     * Add projects
     *
     * @param $input
     * @return bool
     */
    public function addProject($input)
    {
      /*   try {
            Need::create($input);
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        } */
    }

    /**
     * Get all donations
     *
     * @param $limit
     * @return bool
     */
    public function getProjects($limit = null)
    {
        /* try {
            if ($limit) {
                return Need::orderBy('id', 'desc')->take($limit)->get();
            }
            return Need::orderBy('id', 'desc')->paginate(10);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        } */
    }

    /**
     * Find projct
     *
     * @param $id
     * @return bool
     */
    public function findProject($id)
    {
       /*  try {
            return Need::find($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        } */
    }
    
    /**
     * 
     * @param type $search
     * @return boolean
     */
    public function searchProject($search){
        
       /*  $searchParts = explode(" ", str_replace(",", " ", $search));
        
        try {
           $query = Need::query();
           if(strlen($search)>0){
                foreach($searchParts as $searchPart){
                    $query = $query->where(DB::Raw('CONCAT_WS(" ",name,telephone,address,city,needs)'),"like","%$searchPart%");
                }
           }
           return $query->get();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        } */
        
    }
}
