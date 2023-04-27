<?php




	// CONNECT TO THE DATABASE

$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES

	$u = $_POST['u'];
	$e = $_POST['e'];
	$p = $_POST['p'];
	$Code = $_POST['c'];

//echo"$e hel $Code   bbbbb $p   lllllo  $u";


/*
	$Code = clean_Input($db_conx,$c);
	$p = clean_Input($db_conx,$p);
	$u = clean_Input($db_conx,$u);
	$e = clean_Input($db_conx,$e);
/*/
//c:1159,u:Test1234vkv,e:1988lrp@gmail.com,p:1234

	$sql = "SELECT userID FROM UsersInfoTable WHERE userName='$u' AND userTempCode= '$Code' ";
    $query = mysqli_query($db_conx, $sql); 
	$check = mysqli_num_rows($query);
 $row = mysqli_fetch_row($query);
			$id = $row[0];
//echo"$sql   <br>     ID/$id  <br>            numrows/$check<br>";

if($check >0){
	
	
	
	
		


	// Check their credentials against the database
	$sql = "SELECT * FROM UsersInfoTable WHERE userID='$id' AND userName='$u' AND userEmail='$e' AND userPasscode='$p' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
	$numrows = mysqli_num_rows($query);
	// Evaluate for a match in the system (0 = no match, 1 = match)

	// Match was found, you can activate them
	$sql = "UPDATE UsersInfoTable SET userActivated='1', userEmailVerified='YES' WHERE userID='$id' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
	// Optional double check to see if activated in fact now = 1
	$sql = "SELECT * FROM UsersInfoTable WHERE userID='$id' AND userActivated='1' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
	$numrows = mysqli_num_rows($query);
	// Evaluate the double check
    if($numrows == 0){
		// Log this issue of no switch of activation field to 1
	
echo 'YES/activation_failure';
    	exit();
    } else if($numrows == 1) {
		$rand = substr(md5(microtime()),rand(0,26),3);

$num = $id;
$num_padded = sprintf("%03d", $num);
$userLink =$rand;
$userLink .=$num_padded;

		
		
			// Create directory(folder) to hold each user's files(pics, MP3s, etc.)
		if (!file_exists("/HoodAwards/user/users/$userLink")) {
//			$userLink = preg_replace('/\s+/', '_', $u);
			mkdir("/HoodAwards/user/users/$userLink", 0755);
		}
			$sql = "UPDATE UsersInfoTable SET userLink='$userLink' WHERE userID='$id' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
		
		// Great everything went fine with activation!
	
			

			
	
	echo"YES/$id";
		

	exit();
}

}else{
	echo"NO/Wrong";
}
?>