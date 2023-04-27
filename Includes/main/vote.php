<?php



$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 


// $output = clean_Input($db_conx,$input);


	$videoID = $_POST['v'];
	$userID = $_POST['u'];
	$type = $_POST['type'];

 $videoID = clean_Input($db_conx,$videoID);
 $userID = clean_Input($db_conx,$userID);
 $voted_Type = clean_Input($db_conx,$type);
	
    $check = 0;
	$sql0 = "SELECT * FROM VideoVoteTable WHERE Voted_uID ='$userID' AND Vote_vID='$videoID' LIMIT 1";
    $query = mysqli_query($db_conx, $sql0); 
    $check = mysqli_num_rows($query);
	


	if($check > 0){
			//$sql1 = "UPDATE VideoVoteTable SET Vote_vID = '$videoID', voted_Type = '$voted_Type'  WHERE Voted_uID='$userID' LIMIT 1";
	//$query = mysqli_query($db_conx, $sql1);
	
	}else{
	
	
	$sql1 = "INSERT INTO VideoVoteTable 
	(	 Voted_uID,  Vote_vID, voted_Type  ) VALUES
        			('$userID', '$videoID' ,'$voted_Type' )";
        					$query = mysqli_query($db_conx, $sql1);
				
				
				
			}	
							
	if($query){
	
	
	
	
	
	 if($voted_Type == 'UP'){
		$sql7 = "UPDATE videoInfoTable SET videoVoteUp = videoVoteUp + 1  WHERE videoID='$videoID' LIMIT 1";
	$query2 = mysqli_query($db_conx, $sql7);

echo UP;
}else{

		$sql7 = "UPDATE videoInfoTable SET videoVoteDown = videoVoteDown + 1  WHERE videoID='$videoID' LIMIT 1";
	$query2 = mysqli_query($db_conx, $sql7);
	echo DOWN;
	}

			
	
	

  }
	


?>		



