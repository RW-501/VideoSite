<?php

$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$areaCode = $geo["geoplugin_areaCode"];
$latitude = $geo["geoplugin_latitude"];
$longitude = $geo["geoplugin_longitude"];
$country = $geo["geoplugin_countryName"];
$currentState = $geo["geoplugin_regionName"];
$currentCity = $geo["geoplugin_city"];	




$p_hash = md5 ($p);



if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}

$sql = "SELECT * FROM GuestLogTable WHERE userEmail='$e' AND userActivated='1' LIMIT 1";
        $query = mysqli_query($db_conx, $sql);
        $row = mysqli_fetch_row($query);
		$db_id = $row[0];
		$db_username = $row[1];
        $db_pass_str = $row[2];
		if($p != $db_pass_str){



$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 2), "/"); // 86400 = 1 day








			$sql = "UPDATE GuestLogTable SET guestIPAddress='$user_ip', userCountry='$country', userState='$currentState', userCity='$currentCity', userLastLogin=now() WHERE userName='$db_username' LIMIT 1";
            $query = mysqli_query($db_conx, $sql);


		}
		




?>