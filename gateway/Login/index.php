	  <?php 
	  	$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/plugin_stats/check_login_status.php";
   include($path); 


   
// If user is already logged in, Login Page
if($user_ok == true){
		$uName = $_SESSION["username"];
		$userid = $_SESSION["userid"];

	$URL="https://www.BlackPeopleMarketplace.com/HoodAwards/user/index.php?u=$userid";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
	
	//header('location: https://www.BlackPeopleMarketplace.com/user/index.php?u=$uName');
	//echo"profile page? $uName";
    exit();
}
?><?php
// AJAX CALLS THIS LOGIN CODE TO EXECUTE
if(isset($_POST["e"])){
	// CONNECT TO THE DATABASE
//include_once("../Merchandise/Includes/db_Conx/db_MainConxNew.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
	$e = clean_Input($db_conx, $_POST['e']);
	$p = clean_Input($db_conx, $_POST['p']);
	$p = md5($p);
	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	// FORM DATA ERROR HANDLING
	if($e == "" || $p == ""){
			//header("location: https://www.BlackPeopleMarketplace.com");

			echo "loginfailed";
       exit();
	} else {
	// END FORM DATA ERROR HANDLING
		$sql = "SELECT userID, userName, userPasscode FROM UsersInfoTable WHERE userEmail='$e' AND userActivated='1' LIMIT 1";
        $query = mysqli_query($db_conx, $sql);
        $row = mysqli_fetch_row($query);
			$db_id = $row[0];
		$db_username = $row[1];
        $db_pass_str = $row[2];
		$loginType ="Email";
		if($row == 0){
					$sql = "SELECT userID, userName, userPasscode FROM UsersInfoTable WHERE userName='$e' AND userActivated='1' LIMIT 1";
        $query = mysqli_query($db_conx, $sql);
        $row = mysqli_fetch_row($query);
			$db_id = $row[0];
		$db_username = $row[1];
        $db_pass_str = $row[2];
					$loginType ="Username";

			
		}		
		
		
		if($p != $db_pass_str){
			//header("location: https://www.BlackPeopleMarketplace.com");

			echo "loginfailed";
          // exit();
			
			
			
			
		} else {
			// CREATE THEIR SESSIONS AND COOKIES
			$_SESSION['userid'] = $db_id;
			$_SESSION['username'] = $db_username;
			$_SESSION['password'] = $db_pass_str;
			setcookie("id", $db_id, strtotime( '+30 days' ), "/", "", "", TRUE);
			setcookie("user", $db_username, strtotime( '+30 days' ), "/", "", "", TRUE);
    		setcookie("pass", $db_pass_str, strtotime( '+3 days' ), "/", "", "", TRUE); 
			// UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
			
$user_platform    =   $_SERVER['HTTP_USER_AGENT'];

$browserType = substr($user_platform,0,100);
			


			
			$sql1 = "UPDATE UsersInfoTable SET userIPaddress='$ip', userCountry='$currentCountry', userRegion='$currentRegionName', userState='$currentRegionName', userCity='$currentCity',userBrowserType='$browserType',userZipCode='$currentZipCode', userLastLogin=now() WHERE userName='$db_username' LIMIT 1";
            $query = mysqli_query($db_conx, $sql1);
	
				$sql = "INSERT INTO LoginTrackTable (loginTrack_userID, loginTrack_userIP, loginTrack_userBrowser, loginTrack_userTime,loginTrack_loginType) VALUES ('$db_id','$ip','$browserType', now(),'$loginType' )";
		$query = mysqli_query($db_conx, $sql);
			
			echo $db_id;
		    exit();
		}
	}
	exit();
}
?>