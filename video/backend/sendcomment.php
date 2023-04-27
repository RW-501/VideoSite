 <?php


	$senderID = $_POST['s'];
	$videoID = $_POST['i'];
	$comment = $_POST['m'];
$reciverID = $_POST['r'];




$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 $videoID = clean_Input($db_conx,$videoID);
 $senderID = clean_Input($db_conx,$senderID);
 $comment = clean_Input($db_conx,$comment);
 $reciverID = clean_Input($db_conx,$reciverID);




			$sql1 = "INSERT INTO CommentsTable 
	(	commentSenderID, commentVideoID,  commentMsg, commentDate, commentReplytoUserID, commentDeleteBool   ) VALUES
        			('$senderID' ,'$videoID', '$comment' ,'$now' ,'$reciverID' ,'NO' )";
        					$query = mysqli_query($db_conx, $sql1);
		if($query){
					
			
			$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/video/backend/updatecomments.php";
   include($path);
			
			
			
			
			//echo "Sent";
		} else {
				//	echo "failed Please try again. Code: 04 $sql1";

		}

?>
		