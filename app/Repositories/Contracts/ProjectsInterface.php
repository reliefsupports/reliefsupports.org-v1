<?php
/**
 * Created by eclipse.
 * User: ravithb
 * Date: 6/4/17
 * Time: 10:32 PM
 */

namespace App\Repositories\Contracts;

interface ProjectsInterface
{
    /**
     * Add project
     *
     * @param $input
     * @return mixed
     */
    public function addProject($input);

    /**
     * Get all projects
     *
     * @param $limit
     * @return mixed
     */
    public function getProjects($limit = null);

    /**
     * Find projects
     *
     * @param $id
     * @return mixed
     */
    public function findProject($id);
}