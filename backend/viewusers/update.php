<?php



	$uID = $_POST['zzzzzzz'];
	$note = $_POST['note'];
//$note ="review";

$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 //$uID = clean_Input($db_conx,$uID);


			$sql = "UPDATE UsersInfoTable SET userDeleteBOOL='YES' , userReview='$note' WHERE userID=$uID LIMIT 1";
            $query = mysqli_query($db_conx, $sql);

	if($query){
	echo "DONE";
					
					}else{
					
						echo "ERROR";

					}







?>