<?php

	if(isset($_POST['cu'])){
			$current_uID = $_POST['cu'];
			$following_uID = $_POST['fu'];


 $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
   

	$query_following = "SELECT * FROM `FollowingTable` WHERE `userID`= '$current_uID' AND followingID='$following_uID' AND following= 'YES' ";

	$result_following = mysqli_query($db_conx, $query_following);
	$numrows_following = mysqli_num_rows($result_following);
	
if($numrows_following > 0){
	
$title_following = "<i class='fa fa-user-times'></i> Following";

//return $title_following;
			}else{
$title_following = "<i class='fa fa-user-plus'></i> Follow";
//return $title_following;
			}
			
		echo 	$title_following;
			
			}else{
			echo "error";
			}
?>
				