<?php 

// Initialize any variables that the page might echo
$u = "";
$user_query = "";
$userlevel = "";
$numrows = "";
$Admin_query = "";
$lastsession = "";
$AdminNumrows = "";
$uID = '';
	

function _s_has_letters( $string ) {
    return preg_match( '/[a-zA-Z]/', $string );
}
	
// Make sure the _GET username is set, and sanitize it
if(isset($_GET["u"])){
	$uID = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
	
//$numOrC = _s_has_letters($uID);

	
		
		
		$sql = "SELECT userID FROM UsersInfoTable WHERE userID='$uID' AND userActivated='1' LIMIT 1";
$user_query = mysqli_query($db_conx, $sql);
        $row = mysqli_fetch_row($user_query);
if($row > 0){

			$uID = $row[0];

	
} else{
	
	
	$URL="https://www.BlackPeopleMarketplace.com/HoodAwards/";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
	 exit();	
	 
	
}

																									
	
	
	
	
	
// Select the member from the users table
$sql = "SELECT * FROM UsersInfoTable WHERE userID='$uID' AND userActivated='1' LIMIT 1";
$user_query = mysqli_query($db_conx, $sql);
// Now make sure that user exists in the table
$numrows = mysqli_num_rows($user_query);
if($numrows < 1){
	echo "That user $uID does not exist or is not yet activated, press back $user_query.<br> $sql.";
	
    exit();	
}
// Check to see if the viewer is the account owner
$isOwner = "no";

if($uID == $userid && $user_ok == true){
	$isOwner = "yes";
	$sql = "SELECT * FROM UsersInfoTable WHERE userID='$uID' AND userlevel='Admin' LIMIT 1";
$Admin_query = mysqli_query($db_conx, $sql);
// Now make sure that user exists in the table
$AdminNumrows = mysqli_num_rows($Admin_query);
if($AdminNumrows > 0){
$admin = "YES";
}
	$sql = "SELECT * FROM UsersInfoTable WHERE userID='$uID' AND userCity='' LIMIT 1";
$city_query = mysqli_query($db_conx, $sql);
// Now make sure that user exists in the table
$cityNumrows = mysqli_num_rows($city_query);
if($cityNumrows < 0 ){

	
			    $ipApi = unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

		
$currentRegionCode = $ipApi["region"];
$currentCity = $ipApi["city"];
$currentZipCode = $ipApi["zip"];
$currentLatitude = $ipApi["lat"];
$currentLongitude = $ipApi["lon"];
$currentCountry = $ipApi["country"];
$currentRegionName = $ipApi["regionName"];
$currentISP = $ipApi["isp"];
$currentISpOrg = $ipApi["org"];
$currentISpAS = $ipApi["as"];
	
}
	
	
	
	
	
	
}else{
	
	
	// user is not page owner
}
// Fetch the user row from the query above
while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
	$uN = $row["userName"];
	$uID = $row["userID"];
	$uLink = $row["userLink"];

	$userPhotoPath = $row["userPhotoPath"];
	$userBGphotoPath = $row["userBGphotoPath"];
	$userBio = $row["userBio"];
	$userAge = $row["userAge"];
	$userEmail = $row["userEmail"];
	$userCellNumber = $row["userCellNumber"];
	$userZipCode = $row["userZipCode"];
	$gender = $row["userGender"];
	$currentCity = $row["userCity"];
	$country = $row["userCountry"];
		$currentState = $row["userRegion"];
		$userBrowserType = $row["userBrowserType"];
		$userEmailVerified = $row["userEmailVerified"];
	$userlevel = $row["userLevel"];
	$signup = $row["userSignupDate"];
	$lastlogin = $row["userLastLogin"];
	$joindate = strftime("%b %d, %Y", strtotime($signup));
	$lastsession = strftime("%b %d, %Y", strtotime($lastlogin));
	if($gender == "f"){
		$sex = "Female";
	}
}
?>