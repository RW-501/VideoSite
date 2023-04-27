<?php
$video_Id = '0';
	if(isset($_GET['v'])){
			$video_Id = $_GET['v'];
		}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- saved from url=(0033)https://www.BlackPeopleMarketplace.com -->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />

<title>StreetzWatchin</title>
	
<meta name="description" content="Hood Awards">
	
<meta name="keywords" content="Hood Awards ">

<meta name="Distribution" content="Global" />

<meta name="Rating" content="General" />

<meta name="Robots" content="INDEX,FOLLOW" />

<meta name="Revisit-after" content="1 Day" />

<style type="text/css" media="all">

<!--



@import url("/HoodAwards/video/indexCSS.css");


-->

</style>
			<?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/header/header.php";
   include($path);
   ?>
</head>



<body>
 		




	

<div id="page_container">
		<input id="vID" value="<?php echo $video_Id; ?>" hidden="YES">
		<div id="left_side_container">		</div>
		
				<div id="center_container">		
				
				
				
	
										<?php

				$query = "SELECT * FROM  UserOptionsTable  WHERE userOptions_UserID = $log_Id Limit 1";
			$res = mysqli_query($db_conx, $query);
	$nrows = mysqli_num_rows($res);
if($nrows > 0){
		while ($nrows = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	$show_NSFW = $nrows["show_NSFW"];

	$mute_videosOP = $nrows["mute_videos"];
	$loop_videosOP = $nrows["loop_videos"];

		}
}
		
				if($mute_videosOP == "true"){
		$mute_videosOP = "muted";
		}else{ $mute_videosOP = "";
		}
		if($loop_videosOP == "true"){
		$loop_videosOP = "loop";
		}else{ $loop_videosOP = "";
		}









			$query0 =  "SELECT * FROM videoInfoTable where videoDeletedBOOL ='NO'  and videoID = $video_Id LIMIT 1";

			$result = mysqli_query($db_conx, $query0);
//        $row = mysqli_fetch_row($query0);
	$numrows = mysqli_num_rows($result);

				
				
if($numrows > 0){
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		
		
	

			 $videoTitle =  $row['videoTitle'];
			
			


		$videoTitle =  $row['videoTitle'];
		$videoTitleHTML = viewTagsFunc($videoTitle);

		$videoUserID =  $row['videoUserID'];
		$videoCategoryID =  $row['videoCategoryID'];
		$videoPath =  $row['videoPath'];
		$videoDeletedBOOL =  $row['videoDeletedBOOL'];
		$videoTNpath =  $row['videoTNpath'];
		$videoFileSize =  $row['videoFileSize'];
		$videoFileName =  $row['videoFileName'];
		$videoID =  $row['videoID'];
		$videoViews =  $row['videoViews'];
		$videoVoteDown =  $row['videoVoteDown'];
		$videoVoteUp =  $row['videoVoteUp'];
		$SFW_bool =  $row['SFW_bool'];
		$publicbool =  $row['publicbool'];
		
		
				$query = "SELECT * FROM  UserOptionsTable  WHERE userOptions_UserID = $uID Limit 1";
			$res = mysqli_query($db_conx, $query);
	$nrows = mysqli_num_rows($res);
if($nrows > 0){
		while ($nrows = mysqli_fetch_array($res, MYSQLI_ASSOC)) {

	$mute_videosOP = $nrows["mute_videos"];
	$loop_videosOP = $nrows["loop_videos"];
	$show_NSFW = $nrows["show_NSFW"];
		}
}
		

		if($mute_videosOP == "true"){
		$mute_videosOP = "muted";
		}else{ $mute_videosOP = "";
		}
		if($loop_videosOP == "true"){
		$loop_videosOP = "loop";
		}else{ $loop_videosOP = "";
		}

	// true means show Not safe foe work
			if($show_NSFW == 'true'){
		$show_NSFWOP = "AND SFW_bool ='YES' or SFW_bool ='NO'";
		}else{ $show_NSFWOP = "";
		}


										
						$query0 = "SELECT * FROM  UsersInfoTable  WHERE userID = $videoUserID Limit 1";
			$result0 = mysqli_query($db_conx, $query0);
	$numrows0 = mysqli_num_rows($result0);
if($numrows0 > 0){
		while ($numrows0 = mysqli_fetch_array($result0, MYSQLI_ASSOC)) {
	 	$userName = $numrows0["userName"];
	$userID = $numrows0["userID"];
	$userPhotoPath = $numrows0["userPhotoPath"];

		}
}		
}
	
	}
	

		//$videoTitle_Ready = htmlspecialchars($videoTitle); 
$videoTitle_Ready = rawurlencode($videoTitle); 
//$videoTNpath_Ready = rawurlencode($videoTNpath); 





	


			echo"
 <link rel='icon' type='image/x-icon' href='$videoTNpath'>
 
 			<div class='video_main_container'>
			<div class='video_title'  id='vt$videoID' >$videoTitleHTML </div>
			
			<div class='video_container'  >
			<video id='cv$videoID' class='video_player'  poster='$videoTNpath' ondblclick=closeScreenFunc('cv$videoID'); loading='eager' playsinline='playsinline' $mute_videosOP $loop_videosOP autoplay  onplay=get_vid_info_Func('$videoID');>
  <source src='$videoPath'   class='video'>
    Your browser does not support HTML5 video.</video>
				
				<div id='r$videoID' class='report_overlay vOverlay' onclick='report_video_func($videoID)';><lv><i class='fa fa-flag'></i> Report</div></lv>
				
		<div id='u$userID' class='un_overlay u_photo_area vOverlay' onclick=window.location.href='/HoodAwards/user/index.php?u=$userID';>
					<div class='u_photo_box'>
					<img class='u_photo' src='$userPhotoPath'  alt='$userName'>
					</div>
					<div class='u_name'>$userName</div>
					</div>
									
									
									
				<div id='f$videoID' class='fullscreen_overlay vOverlay' onclick='fullscreen_video_func($videoID)';><i class='fa fa-expand'></i></div>
				<button id='pl$videoID' class='v_p_btn vOverlay'  onclick=play_video_func(this,'cv$videoID','$videoID');><i class='fa fa-play'></i></button>
				<div class='video_controls'>
				<div id='vo$videoID' class='v_v_btn vOverlay' onclick=volume_video_func(this,'cv$videoID'); ><i class='fa fa-volume-up'></i></div>
								
				

								</div> 

				</div>
				
									<div class='video_extras'> 				
				<div class='video_vote_btns'>
		<button class='video_vote_btn' id='down_$videoID' load_v=check_for_vote('down_$videoID','$uID','$videoID','DOWN','$videoVoteDown');
		onclick=vote_video_func(this,'$videoID','DOWN'); >$videoVoteDown <i class='fa fa-thumbs-o-down'></i></button>
		
		<button class='video_vote_btn' id='up_$videoID' load_v=check_for_vote('up_$videoID','$uID','$videoID','UP','$videoVoteUp'); 
		onclick=vote_video_func(this,'$videoID','UP'); >$videoVoteUp <i class='fa fa-thumbs-o-up'></i></button>
	</div>
				<button class='video_extra_bts live'  id='com_$videoID' onclick=live_func('$videoID'); >Live</button>
				<button class='video_extra_bts  save_vid'  load_s=check_for_save('a_$videoID','$uID','$videoID');   id='a_$videoID'  onclick=save_video_func(this,'$videoID');><i class='fa fa-bookmark-o'></i> save</button>
				
								<button class='video_extra_bts'  id='sh_$videoID' onclick=share_video_func('$videoID','$videoTitle_Ready'); ><i class='fa fa-external-link'></i> share</button>

				
				<button class='video_extra_bts'  id='v_$videoID' >$videoViews <i class='fa fa-eye'></i></button>
				
				
				
				
				
							
				

				
				
				
				
				</div>
				
				</div>";

 
?>

		
				
				
			
						<div id='comments'>
					<div id='comments_header' class="other_headers">
						<div id='comments_title'  onclick="checkloginFunc()"  class="other_title">Comments</div>
					</div>
			
			
			<div id='comments_area'>
				
				
	
				
				
			<?php
			$path0 = $_SERVER['DOCUMENT_ROOT'];
   $path0 .= "/HoodAwards/video/backend/updatecomments.php";
   include($path0); ?>
				

		
				




				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				</div>
			
			
			
			
<div id='comments_input_area'>
	<div id='input_user_photo' onclick="window.location.href='/HoodAwards/user/?u=<?php echo $uID; ?>'"><img class='user_comment_photo' src='<?php echo "$uPhotoPath";?>'  alt=''  loading='lazy' ></div>
	<div id="input_comment"><textarea contenteditable  maxlength="200" id="comments_input" placeholder="Add your comment.."></textarea></div> <button id='comment_user_button' onclick='send_comment_func(<?php echo "$videoID"; ?>,<?php echo "$videoUserID"; ?>)'>Send</button></div>
			
			
			
			
				</div>
				
				
				
				
				
				
				
				
				
				<div id='other_videos'>
				
				
				
					
			<?php
			
				 $query0 =  "SELECT * FROM videoInfoTable  WHERE videoDeletedBOOL ='NO' AND SFW_bool ='YES' $show_NSFWOP AND publicbool ='YES' order by videoUploadDate desc LIMIT 9"; 

						$result = mysqli_query($db_conx, $query0);
//        $row = mysqli_fetch_row($query0);
	$numrows = mysqli_num_rows($result);

				
				
if($numrows > 0){
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$ii++;
		$videoTitle =  $row['videoTitle'];
		$videoTitleHTML = viewTagsFunc($videoTitle);

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
		$VideoVotes =  $row['VideoVotes'];
				
			
			
			 echo "
						<div id='v$videoID' class='userVideoArea' onclick=view_video_func('$videoID'); >
						
						<div class='v_title' >$videoTitleHTML</div>
						<img class='mini_video_player' src='$videoTNpath' alt='$videoTitle' loading='lazy' >
		

		


			
			
			</div>"; 
			
}
}


?>

					
											<span id="addvideobtn" onclick="add_video_func();">Add Video</span>

				
				
				
				</div>
		
					
				<script>
					
					function _(id){ return document.getElementById(id); }

			var uIP = _('uIP').value;
			var uID = _('uID').value;
			var current_Video = _('vID').value;


 		if(LoggedIn == "YES"){
}else{
_("comments_input_area").style.display = 'none';

}



	











$('#comments_input').keypress(function(event) {
    if (event.keyCode == 13 || event.which == 13) {
        $('#comment_user_button').focus();
        event.preventDefault();
    }
});

			function reply_comment_func(xxxx){
				
	
				
 var elmnt = document.getElementById("comments_input");
  elmnt.scrollIntoView();		
				
				
				elmnt.value  = "reply @"+xxxx ; 


			}	
					
					
					function flag_func(){
					alert("Flag Comment");
					
					}
					
					
			function send_comment_func(videoID,itemUserID){
			
				if(LoggedIn == "YES"){   


			
			
			
	var msg = document.getElementById("comments_input").value;
	var senderID = document.getElementById("uID").value;
			//	alert(senderID +"    1     "+ msg +"    2 "+ itemID+ "     3    "+itemUserID);
			
		$.post("backend/sendcomment.php",  {i:videoID,m:msg,s:senderID}, function(output1) { //alert([output1]);
						
						
		document.getElementById("comments_input").value = '';
	 var elmnt = document.getElementById("comments"); elmnt.scrollIntoView();		
					
$("#comments_area").html(output1);
						
});

}else{
		 opengatewayFunc();

		}

			}
						
		
			

	





	</script>
	
	
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				<!-- page center end-->
				</div>
				
				
				
				
				
				
				<div id="right_side_container">		</div>
				
				
		</div>

<script>
// onclick='clicked_video_func($videoID)';














						
</script>
					<script src="/HoodAwards/Includes/main/v_player_js/index.js"></script>

		
		
</body>
</html>
