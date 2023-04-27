<?php
if (isset($_GET['id']) && isset($_GET['u']) && isset($_GET['e']) && isset($_GET['p'])) {
	// Connect to database and sanitize incoming $_GET variables
//include_once("../../backend/gateway/uploader/Includes/db_Conx/index.php");
 $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
	
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
	$u = preg_replace('#[^a-z 0-9]#i', '', $_GET['u']);
	$e = mysqli_real_escape_string($db_conx, $_GET['e']);
	$p = mysqli_real_escape_string($db_conx, $_GET['p']);
	// Evaluate the lengths of the incoming $_GET variable
	if($id == "" || strlen($u) < 3 || strlen($e) < 5 || $p == ""){
		// Log this issue into a text file and email details to yourself
			$URL="https://www.BlackPeopleMarketplace.com/HoodAwards/gateway/Signup/backend/message.php?msg=activation_string_length_issues";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
	
    	exit(); 
	}
	// Check their credentials against the database
	$sql = "SELECT * FROM UsersInfoTable WHERE userID='$id' AND userName='$u' AND userEmail='$e' AND userPasscode='$p' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
	$numrows = mysqli_num_rows($query);
	// Evaluate for a match in the system (0 = no match, 1 = match)
	if($numrows == 0){
		// Log this potential hack attempt to text file and email details to yourself
		$URL="https://www.BlackPeopleMarketplace.com/HoodAwards/gateway/Signup/backend/message.php?msg=Your credentials are not matching anything in our system";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
	
    	exit();
	}
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
				$URL="https://www.BlackPeopleMarketplace.com/HoodAwards/gateway/Signup/backend/message.php?msg=activation_failure";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
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
						$URL="https://www.BlackPeopleMarketplace.com/HoodAwards/gateway/Signup/backend/message.php?msg=activation_success";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		
    	exit();
    }
} else {
	// Log this issue of missing initial $_GET variables
							$URL="https://www.BlackPeopleMarketplace.com/HoodAwards/gateway/Signup/backend/message.php?msg=missing_GET_variables";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
	
    exit(); 
}
?>