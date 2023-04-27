
<?php


//order by videoViews desc
	 $Hquery =  "SELECT * FROM videoInfoTable  WHERE videoDeletedBOOL ='NO' AND SFW_bool ='YES' $show_NSFWOP AND publicbool ='YES'  order by videoUploadDate desc   LIMIT 4"; 
			$Hresult = mysqli_query($db_conx, $Hquery);
	$Hnumrows = mysqli_num_rows($Hresult);
if($Hnumrows > 0){
		while ($Hrow = mysqli_fetch_array($Hresult, MYSQLI_ASSOC)) {

		$HvideoTitle =  $Hrow['videoTitle'];
		$HvideoTitle = viewTagsFunc($HvideoTitle);
		$HvideoID =  $Hrow['videoID'];

		
		
   echo"<div class='hashtag_slide'>$HvideoTitle</div>";
}
}


?>
