<?php
	$id = $_GET['u'];
			
		// CONNECT TO THE DATABASE


$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path); 
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES





$id = $_GET['u'];



	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));




	// Optional double check to see if activated in fact now = 1



	$sql3 = "SELECT * FROM UsersInfoTable WHERE userID='$id' AND userActivated='1' LIMIT 1";
    $query3 = mysqli_query($db_conx, $sql3);
	$numrows3 = mysqli_num_rows($query3);
	// Evaluate the double check
//echo"$  sql   $id    <Br>  $numrows3 <BR> $sql3";
    if($numrows3 == 0){
		// Log this issue of no switch of activation field to 1
		//echo"$  sql   $id    <Br>  $numrows3 <BR> $sql3";
		
		
				$URL="https://www.BlackPeopleMarketplace.com/HoodAwards/gateway/Signup/backend/message.php?msg=activation_failure";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    	exit(); 
		
		
    } else if($numrows3 == 1) {
		
		while ($row = mysqli_fetch_array($query3, MYSQLI_ASSOC)) {
		$userLink =  $row['userLink'];
		}
			if($userLink == ""){
		$rand = substr(md5(microtime()),rand(0,26),3);

$num = $id;
$num_padded = sprintf("%03d", $num);
$userLink =$rand;
$userLink .=$num_padded;
		$loginType ="Activation";
			}else{
				
				$loginType ="Google Login";
			}
			
			
																												
		
	
		
			// Create directory(folder) to hold each user's files(pics, MP3s, etc.)
		if (!file_exists("/HoodAwards/user/users/$userLink")) {
//			$userLink = preg_replace('/\s+/', '_', $u);
			mkdir("/HoodAwards/user/users/$userLink", 0755);
		}
			$sql4 = "UPDATE UsersInfoTable SET userLink='$userLink' WHERE userID='$id' LIMIT 1";
    $query = mysqli_query($db_conx, $sql4);
		
	
	// END FORM DATA ERROR HANDLING
		$sql0 = "SELECT userID, userName, userPasscode FROM UsersInfoTable WHERE userID='$id' AND userActivated='1' LIMIT 1";
        $query = mysqli_query($db_conx, $sql0);
        $row = mysqli_fetch_row($query);
			$db_id = $row[0];
		$db_username = $row[1];
        $db_pass_str = $row[2];

		
					if($row){

	
			// CREATE THEIR SESSIONS AND COOKIES
			$_SESSION['userid'] = $db_id;
			$_SESSION['username'] = $db_username;
			$_SESSION['password'] = $db_pass_str;
			setcookie("id", $db_id, strtotime( '+30 days' ), "/", "", "", TRUE);
			setcookie("user", $db_username, strtotime( '+30 days' ), "/", "", "", TRUE);
    		setcookie("pass", $db_pass_str, strtotime( '+3 days' ), "/", "", "", TRUE); 

			
						
					$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/plugin_stats/geoInfo/get_geo_info.php";
   include($path); 		
						
						
						
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));

			
			

$browserType = substr($user_platform,0,100);

			


			
			$sql1 = "UPDATE UsersInfoTable SET userIPaddress='$ip', userCountry='$currentCountry', userRegion='$currentRegionName', userState='$currentRegionName', userCity='$currentCity',userBrowserType='$browserType',userZipCode='$currentZipCode', userLastLogin=now() WHERE userName='$db_username' LIMIT 1";
            $query2 = mysqli_query($db_conx, $sql1);
					}
				if($query2){

				$sql = "INSERT INTO LoginTrackTable (loginTrack_userID, loginTrack_userIP, loginTrack_userBrowser, loginTrack_userTime,loginTrack_loginType) VALUES ('$db_id','$ip','$browserType', now(),'$loginType' )";
		$query3 = mysqli_query($db_conx, $sql);
				}
			
			if($query3){
				
			//	echo "_ id<BR>$db_id      _ <BR>sql <br> $sql _ <BR> 1 <br> $sql1 _ <BR> 0 <BR> $sql0 <br> _ <BR>$sql4   <BR><BR> $user_ok <br>$db_id<BR>$db_username<BR>$db_pass_str<BR> " ;
				
				
				

			$URL="https://www.BlackPeopleMarketplace.com/HoodAwards/user/index.php?u=$db_id";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
			
	
				
			}

		
		
    }else{
		

			$URL="https://www.BlackPeopleMarketplace.com/HoodAwards";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		
		
		
	}






















			
	?>
	
