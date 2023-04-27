 <?php


	$msg_senderID = $_POST['s'];
	$msgConvoID = $_POST['mID'];
$msg_receiverID = $_POST['r'];
$msq_text = $_POST['t'];
$msg_read_BOOL = $_POST['rb'];




$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 $msgConvoID = clean_Input($db_conx,$msgConvoID);
 $msg_senderID = clean_Input($db_conx,$msg_senderID);
 $msg_receiverID = clean_Input($db_conx,$msg_receiverID);
 $msq_text = clean_Input($db_conx,$msq_text);
 $msg_read_BOOL = clean_Input($db_conx,$msg_read_BOOL);




	if($msgConvoID == "" || $msgConvoID == null ){

				$sql12 = "INSERT INTO Convo_Table 
	(	convo_starter_uID  ) VALUES
        			('$msg_senderID' )";
        					$query1 = mysqli_query($db_conx, $sql12);
							  $msgConvoID = mysqli_insert_id($db_conx);
		if($msgConvoID){  
		
		
		$sql1 = "INSERT INTO MsgTable 
	(	msg_senderID, msgConvoID,  msg_receiverID, msg_Date, msq_text, msg_read_BOOL   ) VALUES
        			('$msg_senderID' ,'$msgConvoID', '$msg_receiverID' ,'$now' ,'$msq_text' ,'NO' )";
        					$query = mysqli_query($db_conx, $sql1);
		
				if($query){
					
			

			echo "Sent";
		} else {
				//	echo "failed Please try again. Code: 04 $sql1";
				exit;

		}
		
		 }else{
		echo "failed Please try again. Code: 04 $sql12";
		exit;
		}
					
					
					
					
					

		
	}else{
	
			$sql2 = "INSERT INTO MsgTable 
	(	msg_senderID, msgConvoID,  msg_receiverID, msg_Date, msq_text, msg_read_BOOL   ) VALUES
        			('$msg_senderID' ,'$msgConvoID', '$msg_receiverID' ,'$now' ,'$msq_text' ,'NO' )";
        					$query12 = mysqli_query($db_conx, $sql2);
		if($query12){
					
			

			
			echo "Sent";
		} else {
				//	echo "failed Please try again. Code: 04 $sql1";
				exit;

		}
		}

?>
		