<?php

	if(isset($_POST['i'])){


	$userID = $_POST['i'];



$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 $userID = clean_Input($db_conx,$userID);




		$sql = "SELECT * FROM UsersInfoTable WHERE userID='$userID' AND userActivated='1'   ";
$user_query = mysqli_query($db_conx, $sql);
        $row = mysqli_fetch_row($user_query);
if($row > 0){


		$sql = "UPDATE UsersInfoTable SET userActivated='0' WHERE userActivated='1' And  userID='$userID' LIMIT 1";
            $query = mysqli_query($db_conx, $sql);
			
				if($query){
	echo "DONE";
					
					}else{
					
						echo "ERROR";

					}



}


exit;

}


?>