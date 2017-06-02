<?php
date_default_timezone_set('Asia/Colombo');
 $date = date('Y-m-d H:i:s');
 
	$name = $_POST['name'];
	$telephone = $_POST['telephone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$needs = $_POST['needs'];
	$heads = $_POST['heads'];
	include_once('connection.php');

	$query = "INSERT INTO needs (name, telephone, address, city, needs, heads, created_at, updated_at, identifier) 
	
	VALUES ('$name', '$telephone', '$address', '$city', '$needs', $heads, '$date', '$date', 'a')";

	mysqli_query($connection, $query);
	
	$queryForNotifications = "
	SELECT
	
	device_token_text
	
	FROM 
	
	device_token_details ";
	
	$result = mysqli_query($connection, $queryForNotifications);
	$tokens = array();
	while($rows = mysqli_fetch_array($result)){
		$tokens[] = $rows['device_token_text'];
	}

	
	$url = 'path to the file/kitchenAppNotificationAPI.php'; //URL
	$fields = array(
				'userToken' => $tokens,
				'mainValue' => "[ReliefSupport] New Need",
				'subValue1' => $name,
				'subValue2' => $address. " " . $city,
				'subValue3' => $needs,
				'subValue4' => $heads
			);
			
		
			//open connection
			$ch = curl_init();

			//set the url, number of POST vars, POST data
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, count($fields));
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));

			//execute post
			curl_exec($ch);

			//close connection
			curl_close($ch);
	
	
mysqli_close($connection);
print json_encode(utf8ize($ress), JSON_UNESCAPED_SLASHES);

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}
        
?>