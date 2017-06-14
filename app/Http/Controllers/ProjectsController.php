<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectsRepository;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Response;
use App\Repositories\ResourcesRepository;

class ProjectsController extends Controller
{
	private $projectRepository;
	private $resourceRepository;

	/**
	 * ProjectssController constructor.
	 * @param ProjectsRepository $projectRepo
	 */
	public function __construct(ProjectsRepository $projectRepo, ResourcesRepository $resourceRepo)
	{
		$this->projectRepository = $projectRepo;
		$this->resourceRepository = $resourceRepo;
	}

	/**
	 * List all projects
	 *
	 * @return $this
	 */
	public function index()
	{
		$projects = $this->projectRepository->getProjects();
		return view('/frontend/projects/index')->with(['projects' => ($projects) ? $projects : array()]);
	}

	/**
	 * Add project
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function addProject(Request $request)
	{
		if($request->isMethod('post')){
			$messages = [
					'name.required' => 'ව්‍යාපෘති නාමය ඇතුලත් කිරීම අනිවාර්යයි',
					'description.required' => 'විස්තරය ඇතුලත් කිරීම අනිවාර්යයි',
					'purpose.required' => 'අරමුණ ඇතුලත් කිරීම අනිවාර්යයි',
					'address.required' => 'ලිපිනය ඇතුලත් කිරීම අනිවාර්යයි',
					'g-recaptcha-response.required' => 'ඔබව තහවුරු කිරීම අනිවාර්යයි'
			];
				
			$validator = Validator::make($request->all(), [
					'name' => 'required|max:255',
					'description' => 'required',
					'purpose' => 'required',
					'address' => 'required',
					//	'g-recaptcha-response' => 'required|captcha'
			], $messages);
				
			if ($validator->fails()) {
				return redirect('/projects/add')
				->with('isSuccess', false)
				->with('errors', $validator->errors()->all())
				->withInput();
			} else {
				$project = $this->projectRepository->addProject($request->all());
					
				if ($project) {
					return redirect('/projects/add-members/'.$project->id)
					->with('isSuccess', true)
					->with('message', 'පළමු පියවර සාර්ථකව ඇතුලත්කරන ලදී.');
				} else {
					return redirect('/projects/add')
					->with('isSuccess', false)
					->with('errors', ['ඇතුලත්කිරීම දෝෂ සහිතය.'])
					->withInput();
				}
			}
		}else{
			return view('/frontend/projects/add-project');
		}
	}
	
	public function getMember($member_id)
	{
		$member = $this->projectRepository->getMember($member_id);
		
		if ($member) {
			return Response::json([
					'isSuccess' => true,
					'member' => $member,
			]);
		} else {
			return Response::json([
					'isSuccess' => false
			]);
		}
		
	}
	
	public function addMembers($project_id,Request $request)
	{
		$project = $this->projectRepository->findProject($project_id);
		if(!$project){
			echo "Invalid project id.";
			return;
		}
		if($request->isMethod('post')){
			
			$messages = [
					'type.required' => 'සාමාජික ප්‍රවර්ගය තේරීම අනිවාර්යයි',
					'project_id.required' => 'ව්‍යාපෘති හදුනාගැනීමේ අංකය නොමැත',
					'first_name.required' => 'නම ඇතුලත් කිරීම අනිවාර්යයි',
					'last_name.required' => 'වාසගම ඇතුලත් කිරීම අනිවාර්යයි',
					'address.required' => 'ලිපිනය ඇතුලත් කිරීම අනිවාර්යයි',
					'contacts.required' => 'දුරකථන අංක ඇතුලත් කිරීම අනිවාර්යයි',
					'g-recaptcha-response.required' => 'ඔබව තහවුරු කිරීම අනිවාර්යයි'
			];
	
			$validator = Validator::make($request->all(), [
					'first_name' => 'required|max:255',
					'last_name' => 'required|max:255',
					'project_id' => 'required',
					'type' => 'required',
					'address' => 'required',
					'contacts' => 'required',
					//	'g-recaptcha-response' => 'required|captcha'
			], $messages);
	
			if ($validator->fails()) {
				return redirect('/projects/add-members/'.$project_id)
				->with('isSuccess', false)
				->with('errors', $validator->errors()->all())
				->withInput();
			} else {
				$request->request->add(['active_status',1]);
				$response = $this->projectRepository->addMember($request->all());
					
				if ($response){
					return redirect('/projects/add-resources/'.$project_id)
					->with('isSuccess', true)
					->with('message', 'ව්‍යාපෘති සාමාජිකයින් සාර්ථකව ඇතුලත්කරන ලදී.');					
				} else {
					return redirect('/projects/add-members/'.$project_id)
					->with('isSuccess', false)
					->with('errors', ['ඇතුලත්කිරීම දෝෂ සහිතය.'])
					->withInput();
				}
			}
		}else{
			return view('/frontend/projects/add-members')->with(
				[
				 'project' => $project,
				 'members' => $this->projectRepository->getMemberSummary($project_id)
				]
			);
		}
	}
	
	public function deleteMember(Request $request)
	{
		$member_id = $request->input('member_id');
		$project_id = $request->input('project_id');
		if(empty($member_id) || empty($project_id)){
			return redirect('/projects/add-members/'.$project_id)
			->with('isSuccess', false)
			->with('errors', ['මකා දැමීමේ අයැදුම පිලිගත නොහැකියි.']);
		}
		$member = $this->projectRepository->getMember($member_id);
		if($member->project_id!=$project_id){
			return redirect('/projects/add-members/'.$project_id)
			->with('isSuccess', false)
			->with('errors', ['මකා දැමීමට තෝරාගත් අයිතමය මෙම ව්‍යාපෘතියේ සාමාජිකයෙක් නොවේ.']);
		}
		
		$result = $this->projectRepository->deleteMember($member_id);
		$project = $this->projectRepository->findProject($project_id);
		if($result){
			return redirect('/projects/add-members/'.$project_id)
			->with('isSuccess', true)
			->with('members',$project->members())
			->with('message', 'ව්‍යාපෘති සාමාජිකයින් සාර්ථකව මකා දමන ලදී.');
		}else{
			return redirect('/projects/add-members/'.$project_id)
			->with('isSuccess', false)
			->with('members',$project->members())
			->with('message', 'ව්‍යාපෘති සාමාජිකයින් මකා දැමීම අසාර්ථක විය.');
		}
	}
	
	public function getResource($resource_id,$project_id)
	{
		$resource = $this->projectRepository->getProjectResource($resource_id,$project_id);
	
		if ($resource) {
			return Response::json([
					'isSuccess' => true,
					'resource' => $resource,
			]);
		} else {
			return Response::json([
					'isSuccess' => false
			]);
		}
	
	}
	
	public function addResources($project_id,Request $request)
	{
		$project = $this->projectRepository->findProject($project_id);
		if(!$project){
			echo "Invalid project id.";
			return;
		}
		if($request->isMethod('post')){
			$messages = [
					'quantity.required' => 'ප්‍රමාණය ඇතුළත් කිරීම අනිවාර්යයි',
					'g-recaptcha-response.required' => 'ඔබව තහවුරු කිරීම අනිවාර්යයි'
			];
	
			$validator = Validator::make($request->all(), [
					'quantity' => 'required',
					//	'g-recaptcha-response' => 'required|captcha'
			], $messages);
	
			if ($validator->fails()) {
				return redirect('/projects/add-resources/'.$project_id)
				->with('isSuccess', false)
				->with('errors', $validator->errors()->all())
				->withInput();
			} else {

				$response = $this->projectRepository->addResource($request->all());
					
				if ($response){
					return redirect('/projects/add-resources/'.$project_id)
					->with('isSuccess', true)
					->with('message', 'ව්‍යාපෘති සම්පත් සාර්ථකව ඇතුලත්කරන ලදී.');				
				} else {
					return redirect('/projects/add-resources/'.$project_id)
					->with('isSuccess', false)
					->with('errors', ['ඇතුලත්කිරීම දෝෂ සහිතය.'])
					->withInput();
				}
			}
		}else{
			return view('/frontend/projects/add-resources')->with(
					[
							'project' => $project,
							'resources' => $this->projectRepository->getResourceSummary($project_id)
					]
					);
		}
	}
	
	public function deleteResource(Request $request)
	{
		$resource_id = $request->input('resource_id');
		$project_id = $request->input('project_id');
		if(empty($resource_id) || empty($project_id)){
			return redirect('/projects/add-resources/'.$project_id)
			->with('isSuccess', false)
			->with('errors', ['මකා දැමීමේ අයැදුම පිලිගත නොහැකියි.']);
		}
		
		$resource = $this->projectRepository->getProjectResource($resource_id,$project_id);
		if(!$resource){
			return redirect('/projects/add-resource/'.$project_id)
			->with('isSuccess', false)
			->with('errors', ['මකා දැමීමට තෝරාගත් අයිතමය මෙම ව්‍යාපෘතියේ සම්පතක් නොවේ.']);
		}
	
		$result = $this->projectRepository->deleteProjectResource($resource_id,$project_id);
		$project = $this->projectRepository->findProject($project_id);
		if($result){
			return redirect('/projects/add-resources/'.$project_id)
			->with('isSuccess', true)
			->with('members',$project->resources())
			->with('message', 'ව්‍යාපෘති සම්පත් සාර්ථකව මකා දමන ලදී.');
		}else{
			return redirect('/projects/add-resources/'.$project_id)
			->with('isSuccess', false)
			->with('members',$project->resources())
			->with('message', 'ව්‍යාපෘති සම්පත් මකා දැමීම අසාර්ථක විය.');
		}
	}
}