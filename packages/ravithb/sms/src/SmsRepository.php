<?php
namespace Ravithb\Sms;


use Ravithb\Sms\Contracts\SmsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SmsRepository implements SmsInterface
{
	function addSmsMessage($msg)
	{
		try {
			$msg->save();
			return true;
		} catch (\Exception $e) {
			Log::error($e->getMessage());
			return false;
		}
	}
}