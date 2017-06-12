<?php
namespace App\Repositories\Contracts;

interface ResourcesInterface
{
	/**
	 * Add reource
	 *
	 * @param $input
	 * @return mixed
	 */
	public function addResource($input);

	/**
	 * Get all resources
	 *
	 * @param $limit
	 * @return mixed
	 */
	public function getResources($limit = null);

	/**
	 * Find resource like name
	 * 
	 * @param $like
	 * @return mixed
	 */
	public function findResources($like);
	
	/**
	 * Find resource like name, return id,name pairs (for autocomplete and option lists)
	 *
	 * @param $like
	 * @return array()
	 */
	public function findResourcesAsList($like='');
	
	/**
	 * Get all resource types defined.
	 */
	public function getAllResourceTypes();
}