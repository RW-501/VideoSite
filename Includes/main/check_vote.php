<?php

	if(isset($_POST['cu'])){
			$current_uID = $_POST['cu'];
			$Vote_vID = $_POST['vi'];
			$Vote = $_POST['v'];


 $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
   

	$query_following = "SELECT * FROM `VideoVoteTable` WHERE `Voted_uID`= '$current_uID' AND Vote_vID='$Vote_vID' ";

	$result_following = mysqli_query($db_conx, $query_following);
	$numrows_following = mysqli_num_rows($result_following);
	
	if($numrows_following > 0){

		$query_v = "SELECT * FROM `VideoVoteTable` WHERE `Voted_uID`= '$current_uID'  AND Vote_vID='$Vote_vID' AND voted_Type='$Vote' ";

	$result_v = mysqli_query($db_conx, $query_v);
	$numrows = mysqli_num_rows($result_v);
	
if($numrows > 0){
	
		echo $Vote;
			}else{
		echo "";
			}
			
			}else{ 
						//echo "error";
			}	
	
	
	
	}else{
			}
			

?>
			