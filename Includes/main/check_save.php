<?php

	if(isset($_POST['cu'])){
			$userID = $_POST['cu'];
			$videoID = $_POST['v'];


 $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
   
	$query_following = "SELECT * FROM ActivityTable WHERE Reporting_uID ='$userID' AND videoIDsaved='$videoID' LIMIT 1";


	$result_following = mysqli_query($db_conx, $query_following);
	$numrows_following = mysqli_num_rows($result_following);
	
	if($numrows_following > 0){

		echo "SAVED";
			}else{
			 			echo "Unsave";
			}
			
			
		//	echo $query_following;
			}

?>
			