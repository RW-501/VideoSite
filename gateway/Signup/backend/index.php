<?php  /*
session_start();
/// need db conx
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/plugin_stats/check_login_status.php";
   include($path); 	
// If user is already logged in, Signin Page
if($user_ok == true){
		$uName = $_SESSION["username"];
		$userid = $_SESSION["userid"];
$URL="https://www.BlackPeopleMarketplace.com/user/index.php?u=$userid";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
	
	//header('location: https://www.BlackPeopleMarketplace.com/user/index.php?u=$uName');
	//echo"profile page? $uName";
    exit();
}
*/
?>


<?php
// Ajax calls this NAME CHECK code to execute
if(isset($_POST["usernamecheck"])){
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   	$userName = preg_replace('#[^a-z 0-9]#i', '', $_POST['usernamecheck']);
	$sql = "SELECT userID FROM UsersInfoTable WHERE userName='$userName' LIMIT 1";
    $query = mysqli_query($db_conx, $sql); 
    $uname_check = mysqli_num_rows($query);
    if (strlen($userName) < 3 || strlen($userName) > 16) {
	    echo '<strong style="color:#F00;">3 - 16 characters please</strong>';
	    exit();
    }
	if (is_numeric($userName[0])) {
	    echo '<strong style="color:#F00;">Usernames must begin with a letter</strong>';
	    exit();
    }
    if ($uname_check < 1) {
	    echo '<strong style="color:#009900;">' . $userName . ' is OK</strong>';
	    exit();
    } else {
	    echo '<strong style="color:#F00;">' . $userName . ' is taken</strong>';
	    exit();
    }
}


?>
<?php 

// Ajax calls this REGISTRATION code to execute
if(isset($_POST["u"])){

	// CONNECT TO THE DATABASE
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   	// GATHER THE POSTED DATA INTO LOCAL VARIABLES
	$u = preg_replace('#[^a-z 0-9]#i', '', $_POST['u']);
	$u = clean_Input($db_conx,$u);
	$e = clean_Input($db_conx, $_POST['e']);
	$p = clean_Input($db_conx, $_POST['p']);
	//$g = preg_replace('#[^a-z]#', '', $_POST['g']);
	 
	


	// DUPLICATE DATA CHECKS FOR USERNAME AND EMAIL
	$sql = "SELECT userID FROM UsersInfoTable WHERE userName='$u' LIMIT 1";
    $query = mysqli_query($db_conx, $sql); 
	$u_check = mysqli_num_rows($query);
	// -------------------------------------------
	$sql = "SELECT userID FROM UsersInfoTable WHERE userEmail='$e' LIMIT 1";
    $query = mysqli_query($db_conx, $sql); 
	$e_check = mysqli_num_rows($query);
	// FORM DATA ERROR HANDLING
	if($u == "" || $e == "" || $p == ""){
		echo "The form submission is missing values $u $e $p .";
        exit();
	} else if ($u_check > 0){ 
        echo "The userName you entered is alreay taken";
        exit();
	} else if ($e_check > 0){ 
        echo "That email address is already in use in the system";
        exit();
	} else if (strlen($u) < 3 || strlen($u) > 16) {
        echo "Username must be between 3 and 16 characters";
        exit(); 
    } else if (is_numeric($u[0])) {
        echo 'Username cannot begin with a number';
        exit();
    } else {
	// END FORM DATA ERROR HANDLING
	    // Begin Insertion of data into the database
		// Hash the password and apply your own mysterious unique salt
		//$cryptpass = crypt($p);

		
$p_hash = md5 ($p);

		$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/gateway/Signup/randStrGen.php";
   include($path);
		//$p_hash = randStrGen(20)."$cryptpass".randStrGen(20);
		// Add user info into the database table for the main site table
									   

	
	// GET USER IP ADDRESS
   // $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
   
//$user_platform    =   $_SERVER['HTTP_USER_AGENT'];

//$browserType = substr($user_platform,0,100);
			

		
			  $ranNum = str_pad($p_hash,  1, "0",STR_PAD_LEFT);           
		  $ranNum = substr( md5(rand()), 0, 3);
		  $newRanNum = str_pad($ranNum, 4, $ranNum, STR_PAD_LEFT); 
	$newRanNum =	strtoupper($newRanNum);

		$sql1 = "INSERT INTO UsersInfoTable (userName, userEmail, userPasscode, userCountry, userIPaddress, userSignupDate, userLastLogin, userNotesCheck, userRegion, userCity, userBrowserType, userTempCode)       
  VALUES('$u','$e','$p_hash','$currentCountry','$ip',now(),now(),now(),'$currentRegionName', '$currentCity','$browserType','$newRanNum' )";
		$query1 = mysqli_query($db_conx, $sql1); 
		$uid = mysqli_insert_id($db_conx);
	if($query1){
		// Establish their row in the UserOptionsTable table
		$sql = "INSERT INTO UserOptionsTable (userOptions_UserID, userOptions_UserName, userOptions_Background) VALUES ('$uid','$u','original')";
		$query = mysqli_query($db_conx, $sql);
	if($query){
					// Email the user their activation link
	$websiteName = "https://www.BlackPeopleMarketplace.com";
		$to = "$e";							 
		$from = "Black People Marketplace<auto_responder@BlackPeopleMarketplace.com>";
		$subject = 'Black People Marketplace Account Activation';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>BlackPeopleMarketplace.com Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;">
    <p>Hello '.$u.',<br>
      <br>
      To activate your account enter the code below on the screen:&nbsp;&nbsp;</p>
    <p>'.$newRanNum.'</p>
<p>You can also click the link below to activate your account when ready:<br>
      <br>
      <a href="https://www.BlackPeopleMarketplace.com/Signup/activation.php?id='.$uid.'&u='.$u.'&e='.$e.'&p='.$p_hash.'">Click here to activate your account now</a><br>
      <br>
      Login after successful activation using your:<br>
    * E-mail Address: <b>'.$e.'</b></p>
  </div><div class="bottom" style="margin:0px; background-color: rgba(229,229,229,1.00); height: 50px; width: 100%; font-size: 12px;   font-family:Tahoma, Geneva, sans-serif; text-align: center; line-height: 120%;">This email was sent by BlackPeopleMarketplace.com<br>
		If you do not wish to receive emails in the future or this is a wrong email address please unsubscribe.  </div>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
	  
		mail($to, $subject, $message, $headers);
		echo "signup_success";
	}else{
				echo "signup_fail";

	}
		exit();
	}else{
		        echo "DB ERROR: 02";

	}
	exit();
	}
		
		
	
}



?>
