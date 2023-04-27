<?php



	$uID = $_POST['u'];
	$videoID = $_POST['v'];


$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 $videoID = clean_Input($db_conx,$videoID);
 $uID = clean_Input($db_conx,$uID);


			$sql = "UPDATE videoInfoTable SET videoDeletedBOOL='YES' WHERE videoID='$videoID' And  videoUserID='$uID' LIMIT 1";
            $query = mysqli_query($db_conx, $sql);

	if($query){
	echo "DONE";
					
					}else{
					
						echo "ERROR";

					}







?>