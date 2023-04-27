<?php


	if(isset($_POST['i'])){

	$userID = $_POST['i'];
	$userName = $_POST['un'];
	$userLocation = $_POST['loc'];
	$userBio= $_POST['bio'];



$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 $userID = clean_Input($db_conx,$userID);
 $userName = clean_Input($db_conx,$userName);
 $userLocation = clean_Input($db_conx,$userLocation);
 $userBio = clean_Input($db_conx,$userBio);


			$dataURL  = $_POST["dataURL"];

		$sql = "SELECT * FROM UsersInfoTable WHERE userID='$userID' AND userActivated='1'  LIMIT 1";
$user_query = mysqli_query($db_conx, $sql);
        $row = mysqli_fetch_row($user_query);
if($row > 0){
///----------------------------------------------------------


			$path0 = $_SERVER['DOCUMENT_ROOT'];
   $path0 .= "/HoodAwards/user/users/$userID";

			// Create directory(folder) to hold each user's files(pics, MP3s, etc.)
		if (!file_exists("$path0")) {
			mkdir("$path0", 0755);
		}

	
	
		$path1 = $_SERVER['DOCUMENT_ROOT'];
   $path1 .= "/HoodAwards/user/users/$userID/pics";

			// Create directory(folder) to hold each user's files(pics, MP3s, etc.)
		if (!file_exists("$path1")) {
			mkdir("$path1", 0755);
		}

		
				$tNpathfile = $_SERVER['DOCUMENT_ROOT'];
   $tNpathfile .= "/HoodAwards/user/users/$userID/pics/profilepic.png";
		
			  
			
			
	
$dataURL =  substr($dataURL,strpos($dataURL,",")+1);

$encodedData = str_replace(' ','+',$dataURL);
$decodedData = base64_decode($encodedData);

// Path where the image is going to be saved
$filePath = $tNpathfile;
// Write $imgData into the image file
$fileZ = fopen($filePath, 'w');
fwrite($fileZ, $decodedData);
fclose($fileZ);


		
	$mMpathDB = "https://www.BlackPeopleMarketplace.com/HoodAwards/user/users/$userID/pics/profilepic.png";
		


///---------------------------------------------------------

		//	$sql2 = "UPDATE UsersInfoTable SET userDeleteBOOL='YES' , userReview='$note' WHERE userID=$uID LIMIT 1";
		$sql2 = "UPDATE UsersInfoTable SET userName='$userName' , userRegion='$userLocation' , userBio='$userBio', userPhotoPath = '$mMpathDB' WHERE userID=$userID  LIMIT 1";
            $query = mysqli_query($db_conx, $sql2);
			
				if($query){
	echo "UPDATED";
					
					}else{
					
						echo "ERROR";

					}



}


exit;

}


?>