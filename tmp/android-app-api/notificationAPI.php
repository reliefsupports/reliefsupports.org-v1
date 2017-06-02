<?php
$driverToken = $_REQUEST['driverToken']; // device token for driver
$vehicleOwnerToken = $_REQUEST['vehicleOwnerToken']; // device token for vehicle owner
$mainValue = $_REQUEST['mainValue']; // mandetory field (First value) 

if( isset($_REQUEST['subValue1'])){ // optional field
    $subValue1 = $_REQUEST['subValue1'];
}
else{
	$subValue1 = "-";
}

if( isset($_REQUEST['subValue2'])){ // optional field
    $subValue2 = $_REQUEST['subValue2'];
}
else{
	$subValue2 = "-";
}

if( isset($_REQUEST['subValue3'])){ // optional field
    $subValue3 = $_REQUEST['subValue3'];
}
else{
	$subValue3 = "-";
}

if( isset($_REQUEST['subValue4'])){ // optional field
    $subValue4 = $_REQUEST['subValue4'];
}
else{
	$subValue4 = "-";
}

$apiKey = 'AAAARrb9Suw:APA91bG7HwI_OzrlDQ4sSzRMtMN5rzhx9kfPtvHSFEMr1BAYvq_MV6fdJLaWMzr6_HaOfOdQVgq96W-mY9yy64fMVLqG7eakYl5PSPmUzvZ65iLa18qGzsvC9j6xbNt5-n7HUGWILxkU';
$id = '303717763820';

function send($messages, $reg){
	$url = "https://fcm.googleapis.com/fcm/send";
	$fields = array(
		'registration_ids' => $reg,
		'data' => $messages
		);

	$headers = array(
		'Authorization:key = AAAARrb9Suw:APA91bG7HwI_OzrlDQ4sSzRMtMN5rzhx9kfPtvHSFEMr1BAYvq_MV6fdJLaWMzr6_HaOfOdQVgq96W-mY9yy64fMVLqG7eakYl5PSPmUzvZ65iLa18qGzsvC9j6xbNt5-n7HUGWILxkU',
		'Content-Type: application/json'
		);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

	$result = curl_exec($ch);
	if($result === FALSE){
		die('Curl failed: ' . curl_error($ch));
	}
	curl_close($ch);
	return $result;
}
$tokenList = array($driverToken, $vehicleOwnerToken);

$messages = array(
			'mainValue' => $mainValue, 
			'subValue1' => $subValue1, 
			'subValue2' => $subValue2, 
			'subValue3' => $subValue3, 
			'subValue4' => $subValue4, 
			);
$message_status = send($messages, $tokenList);

print json_encode(array('messageStatus' => $message_status));

?>