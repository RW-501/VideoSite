<?php


	if(isset($_POST['u'])){
			$userID = $_POST['u'];



$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
	//	$queryU = "SELECT DISTINCT userName , userPhotoPath , userID, COUNT(videoID) as videocount  FROM UsersInfoTable  join videoInfoTable on UsersInfoTable.userID = videoInfoTable.videoID WHERE userDeleteBOOL = 'NO' ORDER BY RAND ( )  Limit 5";

   }else{
   
		//$queryU = "SELECT DISTINCT userName , userPhotoPath , userID FROM  UsersInfoTable  WHERE userDeleteBOOL = 'NO' ORDER BY RAND ( )  Limit 5";


   }
   
   $queryU = "SELECT videoInfoTable.videoUserID, UsersInfoTable.userName , UsersInfoTable.userPhotoPath , UsersInfoTable.userID, COUNT(*) 
FROM videoInfoTable LEFT JOIN UsersInfoTable ON  UsersInfoTable.userID=videoInfoTable.videoUserID
GROUP BY videoInfoTable.videoUserID,  UsersInfoTable.userDeleteBOOL = 'NO' ORDER BY RAND ( )   Limit 5";
   
//$queryU = "SELECT COUNT(videoInfoTable.videoID) as videoInfoTable.videocount, UsersInfoTable.userName , UsersInfoTable.userPhotoPath , UsersInfoTable.userID FROM videoInfoTable
//LEFT JOIN UsersInfoTable ON  UsersInfoTable.userID=videoInfoTable.videoUserID WHERE videoInfoTable.userDeleteBOOL = 'NO' ORDER BY videocount  Limit 5";

	//	$queryU = "SELECT DISTINCT userName , userPhotoPath , userID FROM  UsersInfoTable  WHERE userDeleteBOOL = 'NO' ORDER BY RAND ( )  Limit 5";

   
		//$queryU = "SELECT  UsersInfoTable.userName , UsersInfoTable.userPhotoPath , UsersInfoTable.userID FROM UsersInfoTable  join videoInfoTable on UsersInfoTable.userID = videoInfoTable.videoID WHERE UsersInfoTable.userDeleteBOOL = 'NO' ORDER BY videocount desc Limit 5";

			$resultU = mysqli_query($db_conx, $queryU);
	$numrowsU = mysqli_num_rows($resultU);
if($numrowsU > 0){	$userPhotoPathU = $numrowsU["userPhotoPath"];

		while ($numrowsU = mysqli_fetch_array($resultU, MYSQLI_ASSOC)) {
	 	$uNU = $numrowsU["userName"];
	$uIDU = $numrowsU["userID"];

	$userPhotoPathU = $numrowsU["userPhotoPath"];
	$videocount = $numrowsU["videocount"];

	//$signup = $numrowsU["userSignupDate"];
	//$lastlogin = $numrowsU["userLastLogin"];

	
	   echo"<img class='user_slide' src='$userPhotoPathU' alt='$uNU' onclick=window.location.href='/HoodAwards/user/index.php?u=$uIDU';>$videocount";
		}
}
			
?>






