<?php
namespace App\Repositories\Contracts;

/**
 * Created by PhpStorm.
 * User: isuru
 * Date: 5/27/17
 * Time: 12:30 AM
 */
interface DonationInterface
{
    /**
     * Add donation
     *
     * @param $input
     * @return mixed
     */
    public function addDonation($input);

    /**
     * Get all donations
     *
     * @param $limit
     * @return mixed
     */
    public function getDonations($limit = null);

    /**
     * Find donation
     *
     * @param $id
     * @return mixed
     */
    public function findDonation($id);
}