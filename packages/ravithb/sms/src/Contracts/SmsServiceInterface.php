<?php 

namespace Ravithb\Sms\Contracts;


interface SmsServiceInterface
{
	public function receive($responseString);
	
	public function sendSms($number, $message);

	public function getDeliveryStatus($messageId);
}