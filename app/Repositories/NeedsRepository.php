<?php
/**
 * Created by PhpStorm.
 * User: isuru
 * Date: 5/27/17
 * Time: 2:31 PM
 */

namespace App\Repositories;

use App\Need;
use App\Repositories\Contracts\NeedsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class NeedsRepository implements NeedsInterface
{
    /**
     * Add needs
     *
     * @param $input
     * @return bool
     */
    public function addNeed($input)
    {
        try {
            Need::create($input);
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
    public function getNeeds($limit = null)
    {
        try {
            if ($limit) {
                return Need::orderBy('id', 'desc')->take($limit)->get();
            }
            return Need::orderBy('id', 'desc')->paginate(10);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    /**
     * Find donation
     *
     * @param $id
     * @return bool
     */
    public function findNeed($id)
    {
        try {
            return Need::find($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
    
    /**
     * 
     * @param type $search
     * @return boolean
     */
    public function searchNeeds($search){
        
        $searchParts = explode(" ", str_replace(",", " ", $search));
        
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
        }
        
    }
}
