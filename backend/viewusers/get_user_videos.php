
<?php


	if(isset($_POST["ID"])){
			$GuID = $_POST["ID"];





   }
?>



					<div id='video_list' class='user_bottom_containers'>

		
			
			<?php //
					echo"xxxxxxxxxxxxxxxxxxxx  $GuID";


				 $videoquery0 =  "SELECT * FROM videoInfoTable  WHERE videoDeletedBOOL ='NO' And videoUserID = $GuID order by videoUploadDate desc "; 

						$videoresult = mysqli_query($db_conx, $videoquery0);
//      $row = mysqli_fetch_row($query0);
	$row = mysqli_num_rows($videoresult);
				
if($row > 0){
		while ($row = mysqli_fetch_array($videoresult, MYSQLI_ASSOC)) {
		$ii++;
		$videoTitle =  $row['videoTitle'];
		$videoTitle = viewTagsFunc($videoTitle);

		$videoUserID =  $row['videoUserID'];
		$videoDate =  $row['videoUploadDate'];
			$videoDate = strftime("%b %d, %Y", strtotime($videoDate));

		$videoCategoryID =  $row['videoCategoryID'];
		$videoPath =  $row['videoPath'];
		$videoDeletedBOOL =  $row['videoDeletedBOOL'];
		$videoTNpath =  $row['videoTNpath'];
		$videoFileSize =  $row['videoFileSize'];
		$videoFileName =  $row['videoFileName'];
		$videoID =  $row['videoID'];
		$videoViews =  $row['videoViews'];
		$videoVoteUp =  $row['videoVoteUp'];
		$videoVoteDown =  $row['videoVoteDown'];
		
					if($videoUserID == $GuID ){
			
			$deleteBTN= "<button class='video_delete'  onclick=deleteVideoFunc('$videoID'); ><lv><i class='fa fa-trash-o'></i> Delete</lv></button>";
			}else{
			$deleteBTN= "";
			}

	
			
			 echo "
			<div id='v$videoID' class='userVideoArea'>
			
			<div class='videoArea'>
			<video preload='none' class='lazy video_player' id='cv$videoID' poster='$videoTNpath' controls playsinline='playsinline' >
  <source data-src='$videoPath'   class='lazy video'>
    Your browser does not support HTML5 video.</video>

			
			 $deleteBTN
			</div>
			
			<div class='videoInfoArea'>
			<div class='video_title' onclick=window.location.href='/HoodAwards/video/?v=$videoID';> $videoTitle<br> $videoFileName</div>
			<div class='video_date'>created $videoDate</div>
			<div class='video_votes'>$videoVoteUp <i class='fa fa-thumbs-o-up'></i> $videoVoteDown <i class='fa fa-thumbs-o-down'></i> </div>
			<div class='video_views'> $videoViews <i class='fa fa-eye'></i>  </div>
			<button class='video_edit'>Edit</button>
			
			
			</div>
			
			
			
			</div>"; 
			
}
}


?>

</div>
