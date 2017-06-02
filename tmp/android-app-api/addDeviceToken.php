<?php
	$token = $_POST['token'];
	include_once('connection.php');

	$query = "INSERT INTO device_token_details (device_token_text) VALUES ('$token')";

	$result = mysqli_query($connection, $query);

	while($rows = mysqli_fetch_array($result)){
		$ress[] = $rows;
	}
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