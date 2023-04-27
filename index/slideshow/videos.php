
<?php

	if(isset($_POST['u'])){
			$userID = $_POST['u'];



$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
   	 $Vquery =  "SELECT * FROM videoInfoTable  WHERE  videoDeletedBOOL ='NO'AND publicbool ='YES' AND SFW_bool ='YES' $show_NSFWOP AND publicbool ='YES'  ORDER BY RAND ( )  LIMIT 4"; 

   }else{
   	 $Vquery =  "SELECT * FROM videoInfoTable  WHERE videoDeletedBOOL ='NO'AND publicbool ='YES' AND SFW_bool ='YES' $show_NSFWOP AND publicbool ='YES'  ORDER BY RAND ( )  LIMIT 4"; 

   
   }
			$Vresult = mysqli_query($db_conx, $Vquery);
	$Vnumrows = mysqli_num_rows($Vresult);
if($Vnumrows > 0){
		while ($Vrow = mysqli_fetch_array($Vresult, MYSQLI_ASSOC)) {
		$VvideoTitle =  $Vrow['videoTitle'];
		//$videoTitle = viewTagsFunc($videoTitle);


		$VvideoCategoryID =  $Vrow['videoCategoryID'];
		$VvideoPath =  $VRow['videoPath'];
		$VvideoTNpath =  $Vrow['videoTNpath'];
		$VvideoID =  $Vrow['videoID'];

		
		
				echo" <img class='video_slide' src='$VvideoTNpath' alt='$VvideoTitle'  onclick=view_video_func('$VvideoID'); >";
}
}


?>
