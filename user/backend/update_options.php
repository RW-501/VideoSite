<?php

	if(isset($_POST['i'])){


	$userID = $_POST['i'];
	$show_NSFW = $_POST['n'];
	$MSG_from_others = $_POST['msg'];
	$mute_videos= $_POST['m'];
	$loop_videos= $_POST['l'];


$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 $userID = clean_Input($db_conx,$userID);
 $show_NSFW = clean_Input($db_conx,$show_NSFW);
 $MSG_from_others = clean_Input($db_conx,$MSG_from_others);
 $mute_videos = clean_Input($db_conx,$mute_videos);
 $loop_videos = clean_Input($db_conx,$loop_videos);



		$sql = "SELECT * FROM UsersInfoTable WHERE userID='$userID' AND userActivated='1'   ";
$user_query = mysqli_query($db_conx, $sql);
        $row = mysqli_fetch_row($user_query);
if($row > 0){


		$sql2 = "UPDATE UserOptionsTable SET show_NSFW='$show_NSFW', MSG_from_others='$MSG_from_others', mute_videos='$mute_videos', loop_videos='$loop_videos' WHERE userOptions_UserID=$userID LIMIT 1";
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