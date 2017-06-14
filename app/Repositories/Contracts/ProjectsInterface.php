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
    
    /**
     * Add a member to a project
     * 
     * @param $input
     * 
     */
    public function addMember($input);
    
    /**
     * Delete a member from a project
     * @param unknown $member_id
     */
    public function deleteMember($member_id);
    
    /**
     * Get the memeber of a project by id
     * @param unknown $member_id
     */
    public function getMember($member_id);
    
    /**
     * Get a resource of a project by id
     * @param unknown $resource_id
     * @param unknown $project_id
     */
    public function getProjectResource($resource_id,$project_id);
    
    /**
     * Delete a resource from a project
     * @param unknown $member_id
     */
    
    public function deleteProjectResource($resource_id,$project_id);
    /**
     * Get a summary of a project's member's info
     * @param unknown $project_id
     */
    public function getMemberSummary($project_id);
    
    /**
     * Get a summary of a project's resources.
     * @param unknown $project_id
     */
    public function getResourceSummary($project_id);
}