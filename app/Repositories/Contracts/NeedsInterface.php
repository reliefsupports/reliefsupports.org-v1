<?php
/**
 * Created by PhpStorm.
 * User: isuru
 * Date: 5/27/17
 * Time: 2:30 PM
 */

namespace App\Repositories\Contracts;

interface NeedsInterface
{
    /**
     * Add need
     *
     * @param $input
     * @return mixed
     */
    public function addNeed($input);

    /**
     * Get all needs
     *
     * @param $limit
     * @return mixed
     */
    public function getNeeds($limit = null);

    /**
     * Find needs
     *
     * @param $id
     * @return mixed
     */
    public function findNeed($id);
}