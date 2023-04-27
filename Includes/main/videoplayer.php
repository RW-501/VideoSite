		<?php


			$result = mysqli_query($db_conx, $queryX);
//        $row = mysqli_fetch_row($query0);
	$numrows = mysqli_num_rows($result);

				
				
if($numrows > 0){
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$ii++;
		$videoTitle =  $row['videoTitle'];
		$videoTitleHTML = viewTagsFunc($videoTitle);
		$videoTNpath =  $row['videoTNpath'];

		$videoUserID =  $row['videoUserID'];
		$videoCategoryID =  $row['videoCategoryID'];
		$videoPath =  $row['videoPath'];
		$videoDeletedBOOL =  $row['videoDeletedBOOL'];
		$videoFileSize =  $row['videoFileSize'];
		$videoFileName =  $row['videoFileName'];
		$videoID =  $row['videoID'];
		$videoViews =  $row['videoViews'];
		$videoVoteDown =  $row['videoVoteDown'];
		$videoVoteUp =  $row['videoVoteUp'];
		$SFW_bool =  $row['SFW_bool'];
		$publicbool =  $row['publicbool'];
		
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

	if($ii == 1){
	//$zzz = "loop autoplay ";
	}else{
	$zzz =""; }
	
	if($ii == 3 ){



$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/index/slideshow.php";
   include($path); 

				}else{
				/// loading='lazy'  preload='none'
//$videoTitle_Ready = htmlspecialchars($videoTitle); 
//$videoTitle_Ready = htmlentities($videoTitle); 
$videoTitle_Ready = rawurlencode($videoTitle); 
//$videoTNpath_Ready = rawurlencode($videoTNpath); 



			echo"  <section id='sec$videoID' class='s$ii c_sec '><div class='video_main_container'>
			<div class='video_title' id='vt$videoID'  onclick=view_video_func('$videoID'); >$videoTitleHTML </div>
			
			<div class='video_container'  >
			<video  preload='none' class='lazy video_player ' id='cv$videoID'  ondblclick=view_video_func('$videoID'); poster='$videoTNpath' loading='lazy' playsinline='playsinline' $zzz $mute_videosOP $loop_videosOP onplay=get_vid_info_Func('$videoID');>
  <source data-src='$videoPath'  class='lazy video'>
    Your browser does not support HTML5 video.</video>
				
				<div id='r$videoID' class='report_overlay vOverlay' onclick='report_video_func($videoID)';><lv><i class='fa fa-flag'></i> Report</lv></div>
				
				<div id='f$videoID' class='fullscreen_overlay vOverlay' onclick='fullscreen_video_func($videoID)';><i class='fa fa-expand'></i></div>
							
							
							
					<div id='u$userID' class='un_overlay u_photo_area vOverlay' onclick=window.location.href='/HoodAwards/user/index.php?u=$userID';>
					<div class='u_photo_box'>
					<img class='u_photo' src='$userPhotoPath'  alt='$userName'>
					</div>
					<div class='u_name'>$userName</div>
					</div>

				
				<button id='pl$videoID' class='v_p_btn vOverlay'   ondblclick=view_video_func('$videoID'); onclick=play_video_func(this,'cv$videoID','$videoID');><i class='fa fa-play'></i></button>
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
				
				
				<button  id='a_$videoID' class='video_extra_bts  save_vid'  load_s=check_for_save('a_$videoID','$uID','$videoID');  onclick=save_video_func(this,'$videoID');><i class='fa fa-bookmark-o'></i> save</button>
				
				
				<button class='video_extra_bts'  id='sh_$videoID' onclick=share_video_func('$videoID','$videoTitle_Ready'); ><i class='fa fa-external-link'></i> share</button>
				
				 
				<button class='video_extra_bts'  id='v_$videoID'  onclick=view_video_func('$videoID');>$videoViews <i class='fa fa-eye'></i></button>
								</div>
				
				</div></section>";
			

				
				
				
				/*<button class='video_extra_bts'  id='sh_$videoID' onclick=share_video_func(this,'$videoTitle_Ready','$videoID'); ><i class='fa fa-external-link'></i> Share</button>
				
				<button class='video_extra_bts'  id='com_$videoID'  onclick=view_video_func('$videoID');><i class='fa fa-comments'></i> Comments</button>
				
				*/
				
				
				
		
			

			
			}
			
			
}
		}
		
		
//  
?>

		