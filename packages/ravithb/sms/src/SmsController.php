<?php

namespace Ravithb\Sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmsController extends Controller
{
	private $smsRepository;
	
	public function __construct(SmsRepository $repo)
	{
		$this->smsRepository = $repo;
	}
	/**
	 * Endpoint to receive sms from dialog
	 *
	 * @return $this
	 */
	public function receive(Request $request)
	{
		$serviceImplClass = 'Ravithb\Sms\Dialog\DialogSmsService';
		
		// $serviceImplClass = config('sms.service.impl',''); 
		
		if(!$serviceImplClass || empty($serviceImplClass))
		{
			http_response_code(500);
			echo "<p>SMS Service Implementation '".$serviceImplClass."' is not found.</p>";
			
			return;
		}
		/**
		 * @var SmsServiceInterface
		 */
		
		$smsService = new $serviceImplClass;
		$smsService->receive($request->json()->all(), function($message){
			$this->smsRepository->addSmsMessage($message);
		});
		http_response_code(200);
		echo "OK";
	}
	
	
}
