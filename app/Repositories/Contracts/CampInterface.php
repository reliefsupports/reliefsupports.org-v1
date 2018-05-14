<?php
namespace App\Repositories\Contracts;

interface CampInterface
{
    /**
     * Add camp
     *
     * @param $input
     * @return mixed
     */
    public function addCamp($input);

    /**
     * Get all camps
     *
     * @param $limit
     * @return mixed
     */
    public function getCamps($limit = null);

    /**
     * Find camp
     *
     * @param $id
     * @return mixed
     */
    public function findCamp($id);
}
