<?php


/*

		var ip = <?php echo $ip; ?>;
		var up = <?php echo $user_platform; ?>;
		var bt = <?php echo $browserType; ?>;
		
		
		var ppu = response.picture.data.url;
		var fn = response.first_name;
		var g = response.gender;
		var ln =	response.last_name;
		var e = response.email;
		var ui = response.id;
		var at = response.accessToken;
		var ex = response.expiresIn;
		var sr = response.signedRequest;
			
			if($query3){
				*/

			$photoUrl = $_POST['ppu'];
			$f_name = $_POST['fn'];
			$e = $_POST['e'];
			$googleID = $_POST['i'];


		// CONNECT TO THE DATABASE

    $ip = $_POST['ip'];
						
$user_platform    =  $_POST['up'];

$browserType =$_POST['bt'];
			


$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path); 
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES
	$sql = "SELECT * FROM UsersInfoTable WHERE googleID='$googleID' AND userEmail='$e' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
	$numrows = mysqli_num_rows($query);
  $row = mysqli_fetch_row($query);
//echo "nr  $numrowsw <br>  $sql <br>";
   if($numrows >=	 1 ){	
   
			$id = $row[0];
	   echo $id;
   }else{
	
	 $ranNum = str_pad($p_hash,  1, "0",STR_PAD_LEFT);           
		  $ranNum = substr( md5(rand()), 0, 3);
		  $newRanNum = str_pad($ranNum, 3, $ranNum, STR_PAD_LEFT); 
	$newRanNum =	strtoupper($newRanNum);

				$passcode = substr(md5(microtime()),rand(0,26),8);

		$userNameNum =  substr($f_name,0,4);
		 $userName = $userNameNum.$newRanNum;
			
	   $u= $userName;
			
		$sql1 = "INSERT INTO UsersInfoTable (userName, userEmail, userPhotoPath, googleID, userIPaddress, userSignupDate, userLastLogin, userNotesCheck, userState, userCity, userBrowserType, userGender, userLastName, userFirstName, userPasscode,userEmailVerified,userActivated )       
  VALUES('$u','$e','$photoUrl','$googleID','$ip',now(),now(),now(),'$currentRegionName', '$currentCity','$browserType','$gender','$l_name','$f_name','$passcode','YES','1')";
		$query1 = mysqli_query($db_conx, $sql1); 
		$id = mysqli_insert_id($db_conx);
		
		//echo $sql1;
   
	if($query1){
		// Establish their row in the UserOptionsTable table
		$sql = "INSERT INTO UserOptionsTable (userOptions_UserID, userOptions_UserName, userOptions_Background) VALUES ('$id','$u','original')";
		$query = mysqli_query($db_conx, $sql);
		
		
		
		
		echo $id;
		exit(); 
		/*/
			$URL="https://www.BlackPeopleMarketplace.com/Signup/login.php?u=$id";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		*/	
	
	
	}
	
	
}  

exit(); 
		




















			
	?>
	