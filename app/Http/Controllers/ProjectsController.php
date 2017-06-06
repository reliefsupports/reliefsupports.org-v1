<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectsRepository;

class ProjectsController extends Controller
{
	private $project;

	/**
	 * ProjectssController constructor.
	 * @param ProjectsRepository $projectsRepository
	 */
	public function __construct(ProjectsRepository $projectsRepository)
	{
		$this->project = $projectsRepository;
	}

	/**
	 * List all projects
	 *
	 * @return $this
	 */
	public function index()
	{
		/*$needs = $this->need->getNeeds();
		return view('/frontend/projects/index')->with(['needs' => ($needs) ? $needs : array()]); */
	}

	/**
	 * Add project
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function add()
	{
		return view('/frontend/projects/add');
	}
}