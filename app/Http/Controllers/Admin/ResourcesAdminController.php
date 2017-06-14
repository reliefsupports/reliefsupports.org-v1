<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;
use App\Http\Controllers\Controller;
use App\Repositories\ResourcesRepository;

class ResourcesAdminController extends Controller
{	
	
	public function __construct(ResourcesRepository $repo)
	{
		$this->resourceRepository = $repo;
	}
	

	public function index(){
		$resources = $this->resourceRepository->getResources();
		
		return view('/frontend/admin/resources/index')->with(
			['resources' => ($resources) ? $resources : array()]
		);
	}
	
	public function add(Request $request){
		if ($request->isMethod('post')){
			$messages = [
					'name.required' => 'නම ඇතුලත් කිරීම අනිවාර්යයි',
					'type.required' => 'වර්ග ඇතුලත් කිරීම අනිවාර්යයි',
					'g-recaptcha-response.required' => 'ඔබව තහවුරු කිරීම අනිවාර්යයි'
			];
			
			$validator = Validator::make($request->all(), [
					'name' => 'required|max:255',
					'type' => 'required',
				//	'g-recaptcha-response' => 'required|captcha'
			], $messages);
			
			if ($validator->fails()) {
				return redirect('/admin/resources/add')
				->with('isSuccess', false)
				->with('errors', $validator->errors()->all())
				->withInput();
			} else {
				$response = $this->resourceRepository->addResource($request->all());
			
				if ($response) {
					return redirect('/admin/resources')
					->with('isSuccess', true)
					->with('message', 'සාර්ථකව ඇතුලත්කරන ලදී.');
				} else {
					return redirect('/admin/resources/add')
					->with('isSuccess', false)
					->with('errors', ['ඇතුලත්කිරීම දෝෂ සහිතය.'])
					->withInput();
				}
			}
		}else{
			return view('/frontend/admin/resources/add')->with(
				['resourceTypes' => $this->resourceRepository->getAllResourceTypes()]
			);
		}
	}
	
	public function edit(){
		
	}
}