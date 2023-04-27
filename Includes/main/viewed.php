<?php

/*
setTimeout(viewed_page(), 3000);

	function viewed_page(){
				var uID = document.getElementById('uID');
				var iID = document.getElementById('iID');

				$.post("backend/viewed.php",  {i:iID}, function() {			
   });	
	}
			
			*/



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
	$sql0 = "SELECT * FROM ViewedTable WHERE viewerID ='$userID' AND viewedVideoID='$videoID'   LIMIT 1";
    $query = mysqli_query($db_conx, $sql0); 
    $check = mysqli_num_rows($query);
	


	if($check > 0){

			$sql = "UPDATE videoInfoTable SET videoViews = videoViews + 1  WHERE videoID='$videoID' LIMIT 1";
	
	$query = mysqli_query($db_conx, $sql);

		 			$Viewed_count =+1;


		
	}else{
	
			$sql1 = "INSERT INTO ViewedTable 
	(	viewerID,  viewedVideoID  ) VALUES
        			('$userID', '$videoID' )";
        					$query = mysqli_query($db_conx, $sql1);
							
							echo"vID    $videoID  /   $query /  SQL  $sql1 / $Viewed_count ????????????????????????????";

		if($query){
		 			$Viewed_count =+1;
		} else {
					echo "failed Please try again. Code: 04 $sql1";

	}

		
	}

		if ($Viewed_count > 0){
	//	$sql2 = "SELECT COUNT(videoViews) AS videoViewsTotal FROM videoInfoTable";
		$sql4 = "SELECT videoViews FROM videoInfoTable WHERE videoID='$videoID' ";
    $query4 = mysqli_query($db_conx, $sql4); 
 $row = mysqli_fetch_row($query4);
			$views = $row[0];
			
			echo"views    $views /  SQL    $sql4 ";

  
					
	
	 
		  
		

		
	}
	

  
	


?>		


