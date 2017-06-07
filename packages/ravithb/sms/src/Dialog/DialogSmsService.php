<?php
namespace Ravithb\Sms\Dialog;

use Ravithb\Sms\Contracts\SmsServiceInterface;
use Ravithb\Sms\SmsMessage;
	
class DialogSmsService implements SmsServiceInterface
{
	public function receive($jsonObj, $callback=null){

		$message = new SmsMessage();
		$message->message = $jsonObj['inboundSMSMessageNotification']['inboundSMSMessage']['message'];
		$message->message_id = $jsonObj['inboundSMSMessageNotification']['inboundSMSMessage']['messageId'];
		$message->date_time = $jsonObj['inboundSMSMessageNotification']['inboundSMSMessage']['dateTime'];
		$message->sender = $jsonObj['inboundSMSMessageNotification']['inboundSMSMessage']['senderAddress'];
		$message->destination_address = $jsonObj['inboundSMSMessageNotification']['inboundSMSMessage']['destinationAddress'];
		
		if($callback){
			$callback($message);
		}
	}
	
	function sendSms($number, $message)
	{
		
	}

	public function getDeliveryStatus($messageId)
	{
		
	}

}