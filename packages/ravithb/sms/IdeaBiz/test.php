<?php
/**
 * Created by PhpStorm.
 * User: Malinda
 * Date: 3/23/2015
 * Time: 11:20 PM
 */

include 'IdeaBizAPIHandler.php';
$auth = new IdeaBizAPIHandler();


$body = '{
  "outboundSMSMessageRequest": {
    "address": [
      "tel:+94777339033"
    ],
    "senderAddress": "94770777555",
    "outboundSMSTextMessage": {
      "message": "Test Message"
    },
    "clientCorrelator": "123456",
    "receiptRequest": {
      "notifyURL": "http://128.199.174.220:1080/sms/report",
      "callbackData": "some-data-useful-to-the-requester"
    },
    "senderName": "87770"
  }
}';

$url = "https://ideabiz.lk/apicall/smsmessaging/v1/outbound/94777339033/requests";

$a = $auth->sendAPICall($url,RequestMethod::POST,$body);

var_dump($a);