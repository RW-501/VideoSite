<?php
//include_once("../db_Conx/index.php");

	//$searchTerm = mysqli_real_escape_string($db_conx, $_POST['q']);

		   
$searchTerm= $p  ;
	
//echo"Search Term =  $searchTerm <br>";

$sql = "SELECT * FROM SearchTermsTable WHERE termName='$searchTerm'LIMIT 1";
        $query = mysqli_query($db_conx, $sql);
        $row = mysqli_fetch_row($query);
			 //  echo"<br>row $row row<br>";
	if($row > 0){
					   //echo"<br>UPDATE<br>";

				$sql = "UPDATE SearchTermsTable SET termSearchCount = termSearchCount +1 WHERE termName='$searchTerm' LIMIT 1";
            $query = mysqli_query($db_conx, $sql);
		
	}else{
							   //echo"<br>INSERT<br>";

		$sql = "INSERT INTO SearchTermsTable (termName) VALUES ('$searchTerm')";
		$query = mysqli_query($db_conx, $sql);
		
		
	} 

			   
	


?>


 <?php // include('../includes/log_term.php'); ?>
