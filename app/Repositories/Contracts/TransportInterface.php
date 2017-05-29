<?php
/**
 * Created by IntelliJ IDEA.
 * User: shashika
 * Date: 5/29/17
 * Time: 3:05 PM
 */

namespace App\Repositories\Contracts;

interface TransportInterface
{
    /**
     * Add need
     *
     * @param $input
     * @return mixed
     */
    public function addTransport($input);

    /**
     * Get all needs
     *
     * @param $limit
     * @return mixed
     */
    public function getTransports($limit = null);

    /**
     * Find needs
     *
     * @param $id
     * @return mixed
     */
    public function findTransport($id);
}