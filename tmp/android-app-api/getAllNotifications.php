<?php
	include_once('connection.php');

	$query = "SELECT notification_main_value, notification_sub_value_1, notification_sub_value_2, notification_sub_value_3, notification_sub_value_4, notification_date_time FROM notification_details ORDER BY notification_id DESC";

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