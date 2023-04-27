<?php


$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 


// $output = clean_Input($db_conx,$input);


	$videoID = $_POST['v'];
	$userID = $_POST['u'];
	$ip = $userID;
 $videoID = clean_Input($db_conx,$videoID);
 $userID = clean_Input($db_conx,$userID);
	
    $check = 0;
	$sql0 = "SELECT * FROM ActivityTable WHERE Reporting_uID ='$userID' AND videoIDsaved='$videoID' LIMIT 1";
    $query = mysqli_query($db_conx, $sql0); 
    $check = mysqli_num_rows($query);
	


	if($check > 0){
	$sql0 = "UPDATE ActivityTable SET  videoIDsaved='' Where Reporting_uID ='$userID'  LIMIT 1";
    $query = mysqli_query($db_conx, $sql0); 
    $check = mysqli_num_rows($query);
	
		$sql7 = "UPDATE videoInfoTable SET videoSavedCount = videoSavedCount - 1  WHERE videoID='$videoID' LIMIT 1";
	$query2 = mysqli_query($db_conx, $sql7);
			 			echo "Unsave";

		}else{
	
			$sql1 = "INSERT INTO ActivityTable 
	(	 Reporting_uID,  videoIDsaved  ) VALUES
        			('$userID', '$videoID' )";
        					$query3 = mysqli_query($db_conx, $sql1);
		if($query3){
		$sql7 = "UPDATE videoInfoTable SET videoSavedCount = videoSavedCount + 1  WHERE videoID='$videoID' LIMIT 1";
	$query2 = mysqli_query($db_conx, $sql7);

				
		 			echo "SAVED";
							} else {
					echo "failed Please try again. Code: 04 $sql1";

	}

		
	}
	

  
	


?>		


