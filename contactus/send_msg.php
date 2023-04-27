<?php



 $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);

// $output = clean_Input($db_conx,$input);
	$contact_msg = $_POST['contact_msg'];

if($contact_msg =""){
				echo "Message blank";

}else{
	 // HINT: use preg_replace() to filter the data
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$contact_msg = $_POST['contact_msg'];
	$u = $_POST['u'];
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$feedback = $_POST['feedback'];
 $feedback = clean_Input($db_conx,$feedback);
 $contact_msg = clean_Input($db_conx,$contact_msg);
 $u = clean_Input($db_conx,$u);
 $name = clean_Input($db_conx,$name);
 $subject = clean_Input($db_conx,$subject);
	
    
	$sql = "INSERT INTO FeedbackTable 
	(	feedbackContactName, feedbackUserID, feedbackCity,  feedbackState,  feedbackZipcode, feedbackContactWebsiteRating, 
					feedbackMessage, feedbackIPaddress, feedbackDate,  feedbackDeleteBool, 
					feedbackResondedBOOL ,feedbackSubject ) VALUES
        			('$name' ,'$u' ,'$city','$state','$zip' ,'$feedback', '$contact_msg' ,'$ip' ,'$now' ,'NO','NO', '$subject' )";
        			
        					$query = mysqli_query($db_conx, $sql);
		if($query){

						echo "success";

	
		} else {
		echo "failed Please try again. Code: 04 $sql";
	}
     
	
	
	 
		  
	
	
	
}



?>		




