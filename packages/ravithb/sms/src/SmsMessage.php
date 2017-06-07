<?php
namespace Ravithb\Sms;

use Illuminate\Database\Eloquent\Model;

class SmsMessage extends Model{

	protected $fillable = [
			'message', 'message_id', 'date_time', 'sender', 'destination_address'
	];
}