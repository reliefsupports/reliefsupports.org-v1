<?php
namespace App\Repositories;

use App\Donation;
use App\Repositories\Contracts\DonationInterface;
use Illuminate\Support\Facades\Log;

/**
 * Created by PhpStorm.
 * User: isuru
 * Date: 5/27/17
 * Time: 12:30 AM
 */
class DonationRepository implements DonationInterface
{
    const DONATION_ID_PREFIX = "O";

    /**
     * Add donations
     *
     * @param $input
     * @return bool
     */
    public function addDonation($input)
    {
        try {
            $donation =  Donation::create($input);

            //Update Reference column
            $donation->ref =  self::DONATION_ID_PREFIX.$donation->id;
            $donation->save();

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

    public function cha($id)
    {
        try {
            return Donation::find($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

}