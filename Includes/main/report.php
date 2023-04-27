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

$videoID = $_POST['v'];
	$userID = $_POST['u'];

$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 

 //$output = clean_Input($db_conx,$input);
// $output = clean_Input($db_conx,$input);




 $videoID = clean_Input($db_conx,$videoID);
 $userID = clean_Input($db_conx,$userID);
	
    $check = 0;
	$sql0 = "SELECT * FROM ActivityTable WHERE Reporting_uID ='$userID' AND videoIDReported='$videoID' LIMIT 1";
    $query0 = mysqli_query($db_conx, $sql0); 
    $check = mysqli_num_rows($query0);
	


	if($check > 0){

			$sql = "UPDATE videoInfoTable SET videoReportCount = videoReportCount + 1  WHERE videoID='$videoID' LIMIT 1";
	
	$query1 = mysqli_query($db_conx, $sql);


		if($query1){
		
		
		
					echo "reported 1";
		} else {
					echo "failed Please try again. Code: 04 $sql 2";

	}
		
	}else{
	
			$sql1 = "INSERT INTO ActivityTable 
	(	 Reporting_uID,  videoIDReported  ) VALUES
        			('$userID', '$videoID'  )";
        					$query = mysqli_query($db_conx, $sql1);
							

		if($query){
		
				$sql5 = "UPDATE videoInfoTable SET videoReportCount = videoReportCount + 1  WHERE videoID='$videoID' LIMIT 1";
	
	$query = mysqli_query($db_conx, $sql5);


		
					echo "reported";
		} else {
					echo "failed Please try again. Code: 04 $sql1";

	}

		
	}



?>		


