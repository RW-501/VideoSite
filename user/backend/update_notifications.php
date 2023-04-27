<?php

	if(isset($_POST['i'])){


	$userID = $_POST['i'];
	
	$n_New_followers_email = $_POST['nfe'];
	$n_New_followers_sms = $_POST['nfs'];
	$n_New_followers_push= $_POST['nfp'];
	
	$n_Updates_Followers_email= $_POST['nufe'];
	$n_Updates_Followers_sms= $_POST['nufs'];
	$n_Updates_Followers_push= $_POST['nufp'];

	$n_for_MSG_email= $_POST['nme'];
	$n_for_MSG_sms= $_POST['nms'];
	$n_for_MSG_push= $_POST['nmp'];

	$s_updates_e= $_POST['sue'];
	$s_updates_s= $_POST['sus'];
	$s_updates_p= $_POST['su_p'];


$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 $userID = clean_Input($db_conx,$userID);
 
 $n_New_followers_email = clean_Input($db_conx,$n_New_followers_email);
 $n_New_followers_sms = clean_Input($db_conx,$n_New_followers_sms);
 $n_New_followers_push = clean_Input($db_conx,$n_New_followers_push);
 
 $n_New_followers_push = clean_Input($db_conx,$n_Updates_Followers_email);
  $n_Updates_Followers_sms = clean_Input($db_conx,$n_Updates_Followers_sms);
 $n_Updates_Followers_push = clean_Input($db_conx,$n_Updates_Followers_push);
 
 $n_for_MSG_email = clean_Input($db_conx,$n_for_MSG_email);
 $n_for_MSG_sms = clean_Input($db_conx,$n_for_MSG_sms);
  $n_for_MSG_push = clean_Input($db_conx,$n_for_MSG_push);
  
 $s_updates_e = clean_Input($db_conx,$s_updates_e);
 $s_updates_s = clean_Input($db_conx,$s_updates_s);
 $s_updates_p = clean_Input($db_conx,$s_updates_p);




		$sql = "SELECT * FROM UsersInfoTable WHERE userID='$userID' AND userActivated='1'   ";
$user_query = mysqli_query($db_conx, $sql);
        $row = mysqli_fetch_row($user_query);
if($row > 0){


		$sql = "UPDATE UserOptionsTable SET show_NSFW='$show_NSFW', MSG_from_others='$MSG_from_others', mute_videos='$mute_videos', loop_videos='$loop_videos' WHERE notifications_userID='$userID' LIMIT 1";
            $query = mysqli_query($db_conx, $sql);
				if($query){
	echo "UPDATED";
					}else{
						echo "ERROR";
					}

}else{

	$sql6 = "INSERT INTO NotificationsTable (notifications_userID) VALUES ('$userID') LIMIT 1";
		$query1 = mysqli_query($db_conx, $sql6);
	if($query1){
	echo "Following";
					
					
					
					
					
					
					}else{
						echo "ERROR";
					}






}


exit;

}


?>