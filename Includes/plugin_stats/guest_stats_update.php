<?php
//include("check_login_status.php");
//include("../includes/check_login_status.php");
//echo" user_ok  =  $user_ok<br>";

	if($user_ok == true){
	
		
	}else{


							//echo" user_ip  =  $user_ip <br>";

		$user_ip_hash = md5 ($user_ip);
$cookie_name = "newGuest";
$cookie_value = "$user_ip_hash";

	$guestFirstVisitDate = date('m-d-y h:i'); 
	$guestLastVisitDate = date('m-d-y h:i'); 

		
	

		$sqlx = "SELECT * FROM GuestLogTable WHERE guestIPAddress='$user_ip' LIMIT 1";
        $queryx = mysqli_query($db_conx, $sqlx);
	$rowx = mysqli_num_rows($queryx);
	//mysqli_close($db_conx);
		
		if($rowx > 0 ){


			$sqlz = "UPDATE GuestLogTable SET guestLastVisitDate = '$guestLastVisitDate' , guestUpdateCounts = guestUpdateCounts + 1 WHERE guestIPAddress='$user_ip' LIMIT 1";
            $queryz = mysqli_query($db_conx, $sqlz);
		
			//mysqli_close($db_conx);
			/*
			$sql = "UPDATE GuestLogTable SET guestUserBrowser = '$browserType' WHERE guestIPAddress='$user_ip' LIMIT 1";
            $query = mysqli_query($db_conx, $sql);
			*/
			} else{

	$user_platform    =   $_SERVER['HTTP_USER_AGENT'];

$browserType = substr($user_platform,0,254);
			
$sqlq = "INSERT INTO GuestLogTable (guestIPAddress, guestFirstVisitDate, guestCountry, guestState, guestCity, guestUpdateCounts, guestUserBrowser) VALUES ('$user_ip','$guestFirstVisitDate','$currentCountry','$currentRegionName','$currentCity','1','$browserType' )";
		$queryq = mysqli_query($db_conx, $sqlq);


	

	



//   include_once("guest_stats_update.php");
		}
	}

?>