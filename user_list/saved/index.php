<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- saved from url=(0033)https://www.BlackPeopleMarketplace.com -->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />

<title>Hood Awards | saved</title>
	
<meta name="description" content="Hood Awards">
	
<meta name="keywords" content="Hood Awards ">

<meta name="Distribution" content="Global" />

<meta name="Rating" content="General" />

<meta name="Robots" content="INDEX,FOLLOW" />

<meta name="Revisit-after" content="1 Day" />

<style type="text/css" media="all">

<!--




@import url("/HoodAwards/user_list/watched/indexCSS.css");


-->

</style>

</head>

<body>
	
 					<?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 


?>



<?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/header/header.php";
   include($path);
   ?>


	

<div id="page_container">
	<div id="left_side_container">		</div>
	

		
				<div id="center_container">	
				
				<button id="back_btn" onclick="back_bt_Func();">Back</button>
				
					<span id="list_title" onclick="">Saved List</span>
					
					
												<div id='video_list' class='user_bottom_containers'>

		
			
			<?php //
		//	ActivityTable SET  videoIDsaved='' Where Reporting_uID 
			
		$videoquery0 = "SELECT * FROM videoInfoTable
LEFT JOIN ActivityTable ON  videoInfoTable.videoID=ActivityTable.videoIDsaved WHERE videoInfoTable.videoDeletedBOOL ='NO' and ActivityTable.Reporting_uID = $uID  order by ActivityTable.upDatedDate desc LIMIT 20 "; 
	 
	 			//	 $videoquery0 =  "SELECT * FROM videoInfoTable  WHERE videoDeletedBOOL ='NO' And videoUserID = $GuID order by videoUploadDate desc "; 

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
		
					if($currentUserID == $GuID && $videoUserID == $GuID ){
			
			$deleteBTN= "<button class='video_delete'  onclick=deleteVideoFunc('$videoID'); ><lv><i class='fa fa-trash-o'></i> Delete</lv></button>";
			}else{
			$deleteBTN= "";
			}

	
			
			 echo "
			<div id='v$videoID' class='userVideoArea'>
			
			<div class='videoArea'>
			<img  class='lazy video_player' id='cv$videoID' src='$videoTNpath' onclick=window.location.href='/HoodAwards/video/?v=$videoID';>


			
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

					<span id="scrollupbtn" onclick="scroll_up_Func();">Scroll Up</span>





			</div>
	
				
				
				
				<div id="right_side_container">

				
				
				</div>
		
		
		
			</div>
		
		
		
		


<script>


var mybutton = document.getElementById("scrollupbtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if ( document.documentElement.scrollTop > 900 || document.getElementById("video_list").scrollTop > 200) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function scroll_up_Func(){

document.getElementById('back_btn').scrollIntoView();


}

function back_bt_Func(){

	if(LoggedIn == "YES"){   

	window.location.href = "https://www.BlackPeopleMarketplace.com/HoodAwards/user/?u=" + uID;

}else{
		 opengatewayFunc();

		}

}


</script>
  		
	
</body>



</html>
