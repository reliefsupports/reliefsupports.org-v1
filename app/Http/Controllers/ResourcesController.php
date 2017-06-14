<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Repositories\ResourcesRepository;

class ResourcesController extends Controller
{	
	
	public function __construct(ResourcesRepository $repo)
	{
		$this->resourceRepository = $repo;
	}
	

	public function searchResource(Request $request){
		if(empty($request->input('name'))){
			return Response::json([
				'isSuccess' => true,
				'resources' => $this->resourceRepository->findResourcesAsList()
			]);
		}
		$resources = $this->resourceRepository->findResourcesAsList($request->input('name'));
		
		if ($resources) {
			return Response::json([
					'isSuccess' => true,
					'resources' => $resources,
			]);
		} else {
			return Response::json([
					'isSuccess' => false,
					'resources' => array(),
			]);
		}
	}
}