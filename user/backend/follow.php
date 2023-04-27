<?php



	$uID = $_POST['u'];
	$followingID = $_POST['f'];


$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 $followingID = clean_Input($db_conx,$followingID);
 $uID = clean_Input($db_conx,$uID);



		$sql7 = "SELECT * FROM FollowingTable WHERE userID='$uID' AND followingID='$followingID'  ";
$user_query = mysqli_query($db_conx, $sql7);
        $row = mysqli_fetch_row($user_query);
if($row > 0){

		$sql8 = "SELECT * FROM FollowingTable WHERE userID='$uID' AND followingID='$followingID' AND following='YES'  ";
$user_query1 = mysqli_query($db_conx, $sql8);
        $row18 = mysqli_fetch_row($user_query1);
if($row18 > 0){
		$sql = "UPDATE FollowingTable SET following='NO' WHERE followingID='$followingID' And  userID='$uID' LIMIT 1";
            $query = mysqli_query($db_conx, $sql);
				if($query){
	echo "<i class='fa fa-user-plus'></i> Follow";
					}else{
						echo "ERROR";
					}

	}else{

	$sql = "UPDATE FollowingTable SET following='YES' WHERE followingID='$followingID' And  userID='$uID' LIMIT 1";
            $query = mysqli_query($db_conx, $sql);
				if($query){
	echo "<i class='fa fa-user-times'></i> Following";
					}else{
						echo "ERROR";
					}


					}
}else{

		$sql6 = "INSERT INTO FollowingTable (followingID, userID, following) VALUES ('$followingID','$uID','YES')";
		$query1 = mysqli_query($db_conx, $sql6);
	if($query1){
	echo "<i class='fa fa-user-times'></i> Following";
					}else{
						echo "ERROR";
					}



}









?>