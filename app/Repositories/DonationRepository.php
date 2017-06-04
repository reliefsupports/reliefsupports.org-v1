<?php
namespace App\Repositories;

use App\Donation;
use App\Repositories\Contracts\DonationInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: isuru
 * Date: 5/27/17
 * Time: 12:30 AM
 */
class DonationRepository implements DonationInterface
{
    /**
     * Add donations
     *
     * @param $input
     * @return bool
     */
    public function addDonation($input)
    {
        try {
            Donation::create($input);
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
    public function getDonations($limit = null)
    {
        try {
            if ($limit) {
                return Donation::orderBy('id', 'desc')->take($limit)->get();
            }
           return Donation::orderBy('id', 'desc')->paginate(10);
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
    public function findDonation($id)
    {
        try {
            return Donation::find($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
    
    /**
     * @param type $search
     * @return array
     */
    public function searchDonations($search){

        $searchParts = explode(" ", str_replace(",", " ", $search));
      
        try {
           $query = Donation::query();
           if(strlen($search)>0){
                foreach($searchParts as $searchPart){
                     $query = $query->where(DB::Raw('CONCAT_WS(" ",name,telephone,address,city,donation,information) '),"like","%$searchPart%");
                }
           }
           return $query->get();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}
