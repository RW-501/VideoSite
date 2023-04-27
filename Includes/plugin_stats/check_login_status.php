<?php

 //$path = $_SERVER['DOCUMENT_ROOT'];
 //  $path .= "/HoodAwards/Includes/db_Conx/index.php";
   //include($path);
//include("../includes/db_Conx/index.php");


  //$path = $_SERVER['DOCUMENT_ROOT'];
  // $path .= "/HoodAwards/plugin_stats/geoInfo/get_geo_info.php";
//   include_once($path);



//include('../geoInfo/get_geo_info.php');

/*
$file_path = "db_Conx/index.php";
$content = file_get_contents($file_path);

if ($content== "SuccessConX"){
}
else {
}



*/

// Files that inculde this file at the very top would NOT require 
// connection to database or session_start(), be careful.
// Initialize some vars
$user_ok = false;
$log_id = "";
$log_username = "";
$log_password = "";
// User Verify function
function evalLoggedUser($db_conx,$id,$u,$p){
	$sql = "SELECT * FROM UsersInfoTable WHERE userID='$id' AND userName='$u' AND userPasscode='$p' AND userActivated='1' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
    $numrows = mysqli_num_rows($query);	
	if($numrows > 0){
		//echo "xxxxxxxxxxx 22222222vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv22222222222222 $user_ok";

		return true;
	}
}
//	echo "xxxxxxxxxxx 2222222222222222222222 $user_ok";

if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
	$log_id = preg_replace('#[^0-9]#', '', $_SESSION['userid']);
	$log_username = preg_replace('#[^a-z 0-9]#i', '', $_SESSION['username']);
	$log_password = preg_replace('#[^a-z0-9]#i', '', $_SESSION['password']);
	// Verify the user
	$user_ok = evalLoggedUser($db_conx,$log_id,$log_username,$log_password);
} else if(isset($_COOKIE["id"]) && isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){
	$_SESSION['userid'] = preg_replace('#[^0-9]#', '', $_COOKIE['id']);
    $_SESSION['username'] = preg_replace('#[^a-z 0-9]#i', '', $_COOKIE['user']);
    $_SESSION['password'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['pass']);
	$log_id = $_SESSION['userid'];
	$log_username = $_SESSION['username'];
	$log_password = $_SESSION['password'];
	// Verify the user
	$user_ok = evalLoggedUser($db_conx,$log_id,$log_username,$log_password);
}
	if($user_ok == true){
		// Update their lastlogin datetime field
		$sql = "UPDATE UsersInfoTable SET userLastLogin=now() WHERE userID='$log_id' LIMIT 1";
        $query = mysqli_query($db_conx, $sql);

// Select the member from the users table
$sql_9 = "SELECT * FROM UsersInfoTable WHERE userID='$log_id' AND userActivated='1' LIMIT 1";
$user_query_9 = mysqli_query($db_conx, $sql_9);
while ($row_9 = mysqli_fetch_array($user_query_9, MYSQLI_ASSOC)) {
	$uN = $row_9["userName"];
	$uID = $row_9["userID"];
	$uLink = $row_9["userLink"];
	$uPhotoPath = $row_9["userPhotoPath"];
	
	$currentCity = $row_9["userCity"];
	$country = $row_9["userCountry"];
		$currentState = $row_9["userRegion"];
		$uIP = $row_9["userIPAddress"];
	$joindate = strftime("%b %d, %Y", strtotime($signup));
	$lastsession = strftime("%b %d, %Y", strtotime($lastlogin));
			$userEmailVerified = $row_9["userEmailVerified"];
			$currentUserID = $uID;
							//echo "xxxx $uIP hhhhhhhhhhhhhhhhhhhhhhhhhhhhhxxxxxxx $user_ok";

	
}		
		


	}



?>
