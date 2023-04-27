
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">



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


@import url("/HoodAwards/user/indexCSS.css");



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
 

// Make sure the _GET username is set, and sanitize it
if(isset($_GET["u"])){
	$GuID = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);

	}
 
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/header/header.php";
   include($path);

			

		

	//$path = $_SERVER['DOCUMENT_ROOT'];
  // $path .= "/HoodAwards/Includes/plugin_stats/verifyuser.php";
   //include($path); 
				$query0 = "SELECT * FROM  UsersInfoTable  WHERE userID = $GuID Limit 1";
			$result0 = mysqli_query($db_conx, $query0);
	$numrows0 = mysqli_num_rows($result0);
if($numrows0 > 0){
		while ($numrows0 = mysqli_fetch_array($result0, MYSQLI_ASSOC)) {
	 	$upageuN = $numrows0["userName"];
			$upageuserlevel = $numrows0["userlevel"];

	$upageuID = $numrows0["userID"];
	$upageuLink = $numrows0["userLink"];
	$upageuBio = $numrows0["userBio"];

	$upagePhotoPath = $numrows0["userPhotoPath"];

	$upageuserEmail = $numrows0["userEmail"];
	$upageuserCellNumber = $numrows0["userCellNumber"];
	
	$upagecurrentCity = $numrows0["userCity"];
	$upagecountry = $numrows0["userCountry"];
		$upagecurrentState = $numrows0["userRegion"];
		$upageuserEmailVerified = $numrows0["userEmailVerified"];
	$upagesignup = $numrows0["userSignupDate"];
	$upagelastlogin = $numrows0["userLastLogin"];
	$upagejoindate = strftime("%b %d, %Y", strtotime($upagesignup));
	$upagelastsession = strftime("%b %d, %Y", strtotime($upagelastlogin));
		}
}

if($currentUserID == $upageuID){
$userProfile = "YES";
$logoutOrFolLink = "onclick=window.location.href='/HoodAwards/gateway/Login/logout.php';";
$logoutOrFolTitle = "<i class='fa fa-sign-out'></i> Logout";


// settings
$SettingsOrMsgLink = "onclick=openSettingsFunc('$upageuID');";
$SettingsOrMsgTitle  = "<i class='fa fa-gear'></i> Settings";

if($upageuserlevel == "Admin"){
$spLink = "<button id='adminBTN' onclick=window.location.href='/HoodAwards/backend/viewusers/'>Admins Only!</button>";

}else{
$spLink = "";

}


}else{
// msg links
$SettingsOrMsgLink = "onclick=messageUserFunc('$upageuID');"; 
$SettingsOrMsgTitle  = "<i class='fa fa-envelope-o'></i> Msg Me";

// follow funk
$logoutOrFolLink = "onclick=followUserFunc('$uID');";

	$query99 = "SELECT * FROM FollowingTable where userID = $currentUserID And followingID=$upageuID And following = 'YES'";


			$result0 = mysqli_query($db_conx, $query99);
	$numrows0 = mysqli_num_rows($result0);
if($numrows0 > 0){
	$logoutOrFolTitle = "<i class='fa fa-user-times'></i> Following";
			}else{
			$logoutOrFolTitle = "<i class='fa fa-user-plus'></i> Follow";
			}




}

?>
							

 <div id="page_container">
		 <input id="GuID" value='<?php echo $GuID; ?>' hidden="YES">

		<div id="left_side_container">		</div>
		
				<div id="center_container">		
				<div id="center_container_content"  class='page_wrap'>		
		


				
	

			
			<div id='user_info_area'>
			
			<div id='user_info'>
				<img id='pf_photo' src='<?php echo $upagePhotoPath; ?>'  alt='<?php echo $upageuN; ?>'>
				<div id='u_name'><?php echo $upageuN; ?></div>
				<?php echo $spLink; ?>

		</div>
			
			
						<div id='user_site_info'>
						

						<div id='top_action_btns'>
						<div id='messageUser_btn' class='top_action_btn'    <?php echo $SettingsOrMsgLink; ?> > <?php echo $SettingsOrMsgTitle; ?></div>
						<div id='share_profile_btn'  class='top_action_btn'    onclick=share_profileFunc(); ><i class="fa fa-external-link"></i> Share</div>
						<div id='logout_btn'  class='top_action_btn'     <?php echo $logoutOrFolLink; ?> > <?php echo $logoutOrFolTitle; ?></div>
						</div>
						
						<div id='u_info_area'>
				<div class='u_info'>Member Since:<br /> <?php echo $upagejoindate; ?></div>
				<div class='u_info'>Location:  <?php echo $upagecurrentState; ?></div>
				<button class='u_info'   onclick=openRepFunc(); >Rep Points : 300 </button>
				<div class='u_info'>Bio: <?php echo $upageuBio; ?></div>
				</div>
				


					<?php //echo $currentUserID; ?>
					
		
				</div>
			
			
			
			</div>
			
			<?php
			
			
			$sqlX1 = "SELECT COUNT(followID) as followcount FROM FollowingTable
LEFT JOIN UsersInfoTable ON  UsersInfoTable.userID=FollowingTable.userID WHERE FollowingTable.followingID = $GuID And FollowingTable.following = 'YES'";
  $result1 = mysqli_query($db_conx, $sqlX1);
					while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
		$followcount = $row1["followcount"];
						
					}
					
			
			
			$followingquery992 = "SELECT COUNT(followID) as followingcount FROM FollowingTable
LEFT JOIN UsersInfoTable ON FollowingTable.followingID=UsersInfoTable.userID WHERE FollowingTable.userID = $GuID And FollowingTable.following = 'YES'";			
			  $result2 = mysqli_query($db_conx, $followingquery992);
					while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
		$followingcount = $row2["followingcount"];
						
					}
			
			
			$videoquery03 =  "SELECT COUNT(videoID) as videocount FROM  videoInfoTable  WHERE videoDeletedBOOL ='NO' And videoUserID = $GuID "; 
  $result3 = mysqli_query($db_conx, $videoquery03);
					while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
		$videocount = $row3["videocount"];
						
					}
			
			?>
			
			
						<div id='followBtnsWrap'>
						<div id='followBtnsArea'>
			
						<div class='followBtnArea'   onclick=openContain('video_list'); >
			<div class='followbtnsNum'><?php echo $videocount; ?></div>
			<div class='followbtns'><i class="fa fa-video-camera"></i> videos</div>
			</div>
			<div class='btnSpacer'>|</div>
			
						<div class='followBtnArea'  onclick=openContain('followers_list'); >
			<div class='followbtnsNum'><?php echo $followcount; ?></div>
			<div class='followbtns'><i class="fa fa-group"></i> followers</div>
			</div>
						<div class='btnSpacer'>|</div>

									<div class='followBtnArea'   onclick=openContain('following_list'); >
			<div class='followbtnsNum'><?php echo $followingcount; ?></div>
			<div class='followbtns'><i class="fa fa-group"></i> following</div>
			</div>
			
						</div>
						
						</div>
						
						
						<script>
						
						 function openContain(xxx) {
  var ss; 
  var slides = document.getElementsByClassName("user_bottom_containers");

  for (ss = 0; ss < slides.length; ss++) {
      slides[ss].style.display = "none";  
  }

  _(xxx).style.display = "block";  
}

window.onload = (event) => {
var i;
var divs = document.querySelectorAll('button'),i;

for (i = 0; i < divs.length; ++i) {
var dataAttribute = divs[i].getAttribute('load_f');
var x = eval(dataAttribute);
//console.log(x+"  yyyy  "+dataAttribute+"  zzz  ");
}


//	var element = document.querySelector('.followbtn');

};	

function check_for_following(xxx, yyyy , zzz){						
							//console.log(xxx+"  yyyy  "+yyyy+"  zzz  "+zzz);
 	$.post("/HoodAwards/Includes/main/check_following.php",  {cu:yyyy,fu:zzz}, function(output) {
//	console.log("output  "+output);
 _(xxx).innerHTML = output;
	});
						}
						
						
						</script>
						
						
						
						
						<div id='followers_list' class='user_bottom_containers'>
			<?php //WHERE  FollowingTable.userID = $userIDAnd FollowingTable.following = 'YES'
			
			
			

			
			
			
			if($currentUserID == $GuID){
			
			$followlink = "Following";
			}else{
			$followlink = "Follow";
			}

			$followersquery99 = "SELECT * FROM FollowingTable
LEFT JOIN UsersInfoTable ON  UsersInfoTable.userID=FollowingTable.userID WHERE FollowingTable.followingID = $GuID And FollowingTable.following = 'YES'";


			$followersresult0 = mysqli_query($db_conx, $followersquery99);
	$numrows5 = mysqli_num_rows($followersresult0);
if($numrows5 > 0){
		while ($numrows5 = mysqli_fetch_array($followersresult0, MYSQLI_ASSOC)) {
	 	$fuN = $numrows5["userName"];
	$uID = $numrows5["userID"];
	$followingID = $numrows5["followingID"];

	$userPhotoPath = $numrows5["userPhotoPath"];

	
//



	//$fol_link = check_for_following($currentUserID, $uID); onclick=followUserFunc('$uID');  onfocusout=check_for_following('fb_$uID','$currentUserID','$uID');
			
					 echo "	<div id='follower$uID' class='followArea'>
			
			<div class='followInfoArea'>
			<img class='f_photos' src='$userPhotoPath' alt='$fuN'  onclick=window.location.href='/HoodAwards/user/index.php?u=$uID';>
			<div class='followersName'>$fuN</div>

			</div>
			
			<div class='followBtnArea'>
	<button id='fb_$uID' load_f=check_for_following('fb_$uID','$currentUserID','$uID');  class='followbtn'  onclick=followUserFunc(this,'$uID');  ></button>
	
			</div>
			
			 
			
			</div>";
			
				}
}
			
			?>
			
			
			
			
			
			
			
			
			
			
						
						
						</div>
												<div id='following_list' class='user_bottom_containers'>

						
			
			<?php //WHERE  FollowingTable.userID = $userIDAnd FollowingTable.following = 'YES'
			
			if($currentUserID == $GuID){
			
			$followlink = "Following";
			}else{
			$followlink = "Follow";
			}

			$followingquery99 = "SELECT * FROM FollowingTable
LEFT JOIN UsersInfoTable ON FollowingTable.followingID=UsersInfoTable.userID WHERE FollowingTable.userID = $GuID And FollowingTable.following = 'YES'";


			$followingresult0 = mysqli_query($db_conx, $followingquery99);
	$numrows0 = mysqli_num_rows($followingresult0);
if($numrows0 > 0){
		while ($numrows0 = mysqli_fetch_array($followingresult0, MYSQLI_ASSOC)) {
	 	$fuN = $numrows0["userName"];
	$uID = $numrows0["userID"];
	$followingID = $numrows0["followingID"];

	$userPhotoPath = $numrows0["userPhotoPath"];

	
			
			
					 echo "	<div id='following$uID' class='followArea'>
			
			<div class='followInfoArea'>
			<img class='f_photos' src='$userPhotoPath' alt='$fuN'  onclick=window.location.href='/HoodAwards/user/index.php?u=$uID';>
			<div class='followersName'>$fuN</div>

			</div>
			
			<div class='followBtnArea'>
	<button id='fb_$uID' load_f=check_for_following('fb_$uID','$currentUserID','$uID');  class='followbtn'  onclick=followUserFunc(this,'$uID');  ></button>
			</div>
			
			 
			
			</div>";
			
				}
}
			
			?>
			
			
			
								
						
						</div>
												<div id='video_list' class='user_bottom_containers'>

		
			
			<?php //
			
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
		
					if($currentUserID == $GuID && $videoUserID == $GuID ){
			
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

					<span id="scrollupbtn" onclick="scroll_up_Func();">Scroll Up</span>


<br />
					<span id="addvideobtn" onclick="add_video_func();">Add Video</span>
							<br />
							</div>
							
	
					
					
					<!--

  onclick=oPageContainer('main_settngs_wrap'); >
  onclick=oPageContainer('center_container'); >

PAGE SETTINGS STARTS


-->
			
						
						

<div id='main_settngs_wrap'  class='page_wrap'>

<div id='setting_top'>
<button id='setting_back_btn'  onclick=oPageContainer('center_container_content'); >Back</button>
<div id='setting_title'>Settings</div>
</div>

<div id='top_wrap'>

<button id='profile_tab' class='settings_tab'  onclick=oSettingsContainer(this,'profile_container'); >
Profile

</button>

<button id='options_tab'  class='settings_tab'   onclick=oSettingsContainer(this,'options_container'); >
Options

</button>


<button id='notifications_tab' class='settings_tab'    onclick=oSettingsContainer(this,'notifications_container'); >
Notifications

</button>


<button id='login_tab' class='settings_tab'    onclick=oSettingsContainer(this,'login_container'); >
Login

</button>



</div>




<div id='bottom_wrap'>



<div id='profile_container' class='settings_wrap'>





<div class="container_wrap wf100">      
<div class='p75'>
</div> 
                                                                                                        
<button id='save_Profile_btn' class='savebtns' onclick=saveProfile(); >Save</button>
</div> 

<div class=" wf100"> 

<div class="container_wrap w50f" onclick="getFileFunc()">                                                                                                                 

<div id='xxx' class="label">Profile Pic</div>
<img id='epf_photo' src="<?php echo $upagePhotoPath; ?>" alt="<?php echo $upageuN; ?>"  />
<canvas id='canvas' ></canvas>
	<input type='file' id='profileimg' name='file' hidden  />

  </div>                      
		
		
	

<div class="container_wrap w50f dg">                                                                                                                 


<div id='uName_area' class="label">Username   <div id='unamestatus' ></div>  </div>
<input id='userName' type="text" name="userName"  onBlur="checkusername()" onKeyUp="restrict('userName')" value="<?php echo $upageuN; ?>" maxlength="20" class="setting_Inputs" />

<div id='xxx' class="label">Location</div>
<input id='userLocation'  type="text" name="userLocation" value="<?php echo $upagecurrentState; ?>" maxlength="20" class="setting_Inputs" />

<div id='xxx' class="label">Bio</div>
<textarea id='userBio'   name="userBio" maxlength="100"  rows="4" cols="50" class="setting_Inputs" /><?php echo $upageuBio; ?></textarea>
</div>
</div>




</div>

<div id='options_container' class='settings_wrap'>
<?php 




			 $query0 =  "SELECT * FROM UserOptionsTable  WHERE userOptions_UserID = '$currentUserID'  LIMIT 1"; 
						$result0 = mysqli_query($db_conx, $query0);
//      $row = mysqli_fetch_row($query0);
	$row0 = mysqli_num_rows($result0);
				
		while ($row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC)) {
		$show_NSFW =  $row0['show_NSFW'];
		$MSG_from_others =  $row0['MSG_from_others'];
		$mute_videos =  $row0['mute_videos'];
		$loop_videos =  $row0['loop_videos'];
		}
		


		if($show_NSFW == "true"){
		$show_NSFW = "checked";
		}else{ $show_NSFW = "";
		}
		if($MSG_from_others == "true"){
		$MSG_from_others = "checked";
		}else{ $MSG_from_others = "";
		}
		if($mute_videos == "true"){
		$mute_videos = "checked";
		}else{ $mute_videos = "";
		}
		if($loop_videos == "true"){
		$loop_videos = "checked";
		}else{ $loop_videos = "";
		}




?>
<div class="container_wrap wf100">      
<div class='p75'>
</div> 
                                                                                                        
<button id='save_option_btn' class='savebtns' onclick=saveOptions(); >Save</button>
</div> 

<div class="container_wrap wf100">                                                                                                                 
<div id='xxx' class="label">Options</div>
<div class="container_wrap wf100">   
<div id='xxx' class="row1">Yes</div>
</div> 
</div> 

<div class="container_wrap wf100">                                                                                                                 
<div id='xxx' class="label">Show Not Safe For Work Videos "NSFW" 18+</div>
<div class="container_wrap wf100">   
<input  id='showNSFW' type="checkbox" name="showNSFW"  class="setting_Checkbox row1" <?php echo $show_NSFW; ?> />
</div> 
</div> 


<div class="container_wrap wf100">                                                                                                                 
<div id='xxx' class="label">Mute Videos</div>
<div class="container_wrap wf100">   
<input  id='mute_v' type="checkbox" name="mute_v"  class="setting_Checkbox row1" <?php echo $mute_videos; ?> />
</div> 
</div> 
 

<div class="container_wrap wf100">                                                                                                                 
<div id='xxx' class="label">Loop Videos</div>
<div class="container_wrap wf100">   
<input  id='loop_v' type="checkbox" name="loop_v"   class="setting_Checkbox row1"  <?php echo $loop_videos; ?> />
</div> 
</div> 


<div class="container_wrap wf100">                                                                                                                 
<div id='xxx' class="label">Recieve Messages From Others You Are Not Following</div>
<div class="container_wrap wf100">   
<input  id='MSG_from_everybody' type="checkbox" name="MSG_from_everybody?"  class="setting_Checkbox row1" <?php echo $MSG_from_others; ?> />
</div> 
</div> 



</div>

<div id='notifications_container' class='settings_wrap'>


<div class="container_wrap wf100">      
<div class='p75'>
</div> 
                                                                                                        
<button id='save_Notifications_btn' class='savebtns' onclick=saveNotifications(); >Save</button>
</div> 


<div class="container_wrap wf100">      
<div id='xxx' class="label">Notifications</div>

<div class="row1">email</div>
<div class="row2">sms</div>
<div class="row3">push</div>

</div> 

<div class="container_wrap wf100">                                                                                                                 
<div id='xxx' class="label">Recieve Notifications For New Followers</div>
<div class="container_wrap wf100">   
<input  id='nF_e' type="checkbox" name="email"  class="notif_Checkbox row1" />
<input  id='nF_s' type="checkbox" name="sms"  class="notif_Checkbox row2" />
<input  id='nF_p' type="checkbox" name="push"  class="notif_Checkbox row3" />
</div> 
</div> 


<div class="container_wrap wf100">                                                                                                                 
<div id='xxx' class="label">Recieve Notifications For Updates From Followers</div>
<div class="container_wrap wf100">   
<input  id='uFF_e' type="checkbox" name="email"  class="notif_Checkbox row1" />
<input  id='uFF_s' type="checkbox" name="sms"  class="notif_Checkbox row2" />
<input  id='uFF_p' type="checkbox" name="push"  class="notif_Checkbox row3" />
</div> 
</div> 


<div class="container_wrap wf100">                                                                                                                 
<div id='xxx' class="label">Recieve Notifications For Messages</div>
<div class="container_wrap wf100">   
<input  id='nMSG_e' type="checkbox" name="email"  class="notif_Checkbox row1" />
<input  id='nMSG_s' type="checkbox" name="sms"  class="notif_Checkbox row2" />
<input  id='nMSG_p' type="checkbox" name="push"  class="notif_Checkbox row3" />
</div> 
</div> 

<div class="container_wrap wf100">                                                                                                                 
<div id='xxx' class="label">Recieve Notifications For Updates on StreetzWatching.com</div>
<div class="container_wrap wf100">   
<input  id='site_e' type="checkbox" name="email" checked class="notif_Checkbox row1" />
<input  id='site_s' type="checkbox" name="sms"  class="notif_Checkbox row2" />
<input  id='site_p' type="checkbox" name="push"  class="notif_Checkbox row3" />
</div> 
</div> 

</div>

<div id='login_container' class='settings_wrap'>

	

<div class="container_wrap wf100">      
<div class='p75'>
</div> 
                                                                                                        
<button id='save_password_btn' class='savebtns' onclick=changePasswordFunc(); >Save</button>
</div> 
<?php

if($upageuserEmailVerified == "YES"){
$upageuserEmailVerified = "<i class='fa fa-check-circle-o' style='font-weight: 700'></i>";
}else{
$upageuserEmailVerified = "";
}
?>
<div class="container_wrap wf100">                                                                                                                 
<div id='xxx' class="label">Email</div>
<div class="container_wrap wf100">   
<div id='xxx' class=""><?php echo $upageuserEmail; ?> <?php echo $upageuserEmailVerified; ?></div>
</div> 
</div> 

<div class="container_wrap wf100">                                                                                                                 
<div id='xxx' class="label">Cell</div>
<div class="container_wrap wf100">   
	<input id='userphone'  type="phone" name="Cell" value="<?php echo $upageuserCellNumber; ?>" class="setting_Inputs" />
</div> 
</div> 


<div id='xxx' class="label">Change Password</div>
<input  id='password1' type="password" name="password" value="<?php echo ""; ?>" maxlength="20" class="setting_Inputs" />
<input  id='password2' type="password" name="password" value="<?php echo ""; ?>" maxlength="20" class="setting_Inputs" />


<div id='xxx' class="label">Logged In Info</div>

<div class="container_wrap wf100">   
<div id='xxx' class="">Last Login: <?php echo $upagelastsession; ?> </div>
</div> 


<div class="container_wrap wf100">      
<button id='deactivate_btn' class="" onclick="deactivateFunc();">Deactivate</button>
</div> 


</div>




</div>
					
					
					
					
					<!--


PAGE SETTINGS ENDS


-->
					
								
					
					
					
					
					
					
				
				</div>
				
				
				
				
				<div id="right_side_container">

				
				
						</div>
				
				
				</div>


		
</body>










			<script>
			
					function getFileFunc(){
					console.log(" ?????????????????????????");
				document.getElementById('profileimg').click();
}
		
			
		
	
	
			
				
///----------------------------------------


    $("#profileimg").change(function(){
	
		readURL(this);
    });




  var vPreview = _("epf_photo");
  var $source = $('#epf_photo');
    var file1 = _("profileimg");

		function readURL(input, i) {



vPreview = _("epf_photo");

  $source[0].src = URL.createObjectURL(file1.files[0]);
     $source.parent()[0];


			/// var reader = new FileReader();
         //   reader.onload = function (e) {
//	_('epf_photo').src = e.target.result;


 //  capture_func();


  
		//	}
            //reader.readAsDataURL(input.files[0]);

           }
		  
		   
			    $("#profileimg").change(function(){
					  				      _('epf_photo').style.display = 'grid';

setTimeout(capture_func, 1000);
///capture_func();
    });

		
	

	 var dataURL;
function capture_func(){
	 //   let img = new Image()
var fileSizeInBytes = file1.files[0].size;



	console.log(" raw width src     "+vPreview.width);
	console.log(" raw height src     "+vPreview.height);
	console.log("  fileSizeInBytes      "+fileSizeInBytes);

if(fileSizeInBytes > '200000'){


var picSize;

if(fileSizeInBytes >= '1000000'){
picSize = 3;
}
if(fileSizeInBytes < '1000000' && fileSizeInBytes >= '500000'){
picSize = 1.5;

}
if(fileSizeInBytes < '500000'){
picSize = 1.1;

}
 	console.log(" smaller ??????????????????     ");


}else{
picSize = 1;

	console.log("  same size  ?????????????????????      ");
}

console.log("  picSize      "+picSize);

    var canvas = document.getElementById('canvas');
//	console.log("  canvas      "+canvas);
	canvas.width = vPreview.width  /picSize ;
	canvas.height = vPreview.height /picSize;

    canvas.getContext('2d').drawImage(vPreview, 0, 0, vPreview.width /picSize , vPreview.height /picSize  );
	console.log("  width src     "+canvas.width);
	console.log("  height src     "+canvas.height);
  
 dataURL = canvas.toDataURL();
 canvas.style.display = 'none';
 
 _("epf_photo").src = dataURL;


//console.log("  dataURL      "+dataURL);
 //console.log(canvas.innerHTML+"  dataURL      "+dataURL+"    preview   "+vPreview.src);

}	
		

		
		
		
			
			//-----------------------------------
			
			
			
				function ajaxObj( meth, url ) {
	var x = new XMLHttpRequest();
	x.open( meth, url, true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	return x;
}
function ajaxReturn(x){
	if(x.readyState == 4 && x.status == 200){
	    return true;	
	}
}
function restrict(elem){

	var tf = _(elem);
 if(elem == "userName"){
		rx = /[^a-z 0-9]/gi;
	}
	tf.value = tf.value.replace(rx, "");

}
			
			
			function checkusername(){
	var u = _("userName").value;
	if(u != ""){
		
		_("unamestatus").innerHTML = 'checking ...';
		var ajax = ajaxObj("POST", "/HoodAwards/gateway/Signup/backend/index.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("unamestatus").innerHTML = ajax.responseText;
	        }
        }
        ajax.send("usernamecheck="+u);
	}
}
			
			
			
			
			
			
						
						 function oSettingsContainer(yyyy, xxx) {
  var ss; 
  var slides = document.getElementsByClassName("settings_wrap");

  for (ss = 0; ss < slides.length; ss++) {
      slides[ss].style.display = "none";  
	  
  }
 // console.log("  yyyy  "+yyyy+"     "+yyyy);
  
 
 
   var sss; 
  var slides2 = document.getElementsByClassName("settings_tab");

  for (sss = 0; sss < slides2.length; sss++) {
      slides2[sss].style.borderBottom = "none"; 
	  
  }
yyyy.style.borderBottom =  "solid #999999 thin";

  _(xxx).style.display = "block";  
}
						
					oSettingsContainer(_('profile_tab'),'profile_container');
						
						</script>
						
						
						
						





<script>
				
					function _(id){ return document.getElementById(id); }

			var uIP = _('uIP').value;
			var uID = _('uID').value;
			var GuID = _('GuID').value;
			var uName = _('u_name').innerHTML;
			
		



function openRepFunc(){

alert("coming soon");

}



function saveProfile(){
		var userName = _('userName').value;
		var userLocation = _('userLocation').value;
		var userBio = _('userBio').value;
 
 
//  console.log("  dataURL      "+dataURL);
   dataURL = _('epf_photo').src;

 //console.log("  dataURL      "+dataURL);
 
	if(LoggedIn == "YES"){  
	$.post("/HoodAwards/user/backend/update_profile.php",  {i:uID,un:userName,loc:userLocation,bio:userBio,dataURL:dataURL}, function(output) {
      _('save_Profile_btn').innerHTML = output;
console.log(uID+"output  "+output+'   '+dataURL);
//_('save_Profile_btn').innerHTML = output;
//console.log(uID+"output  "+userBio+'   '+output);

	});
	}else{
		 opengatewayFunc();
		}
}



function deactivateFunc(){
	if(LoggedIn == "YES"){   
  if (confirm("Are You Sure you Would Deactivate Your Profile?")) {
	$.post("/HoodAwards/user/backend/deact.php",  {i:uID}, function(output) {
_('deactivate_btn').innerHTML = output;

window.location.href='/HoodAwards/gateway/Login/logout.php';
	});
	}
	}else{
		 opengatewayFunc();
		}
}




	var showNSFW ;

const checkbox = document.getElementById('showNSFW');

checkbox.addEventListener('change', (event) => {
  if (event.currentTarget.checked) {
  
if(_('showNSFW').checked = "true"){
  if (confirm("Are You 18+?")) {
_('showNSFW').checked = 'true';


}else{
_('showNSFW').checked = 'false';
}


}else{
//_('showNSFW').checked = 'false';

}

  } else {

  }
  
  console.log(_('showNSFW').checked+"    output  "+"    "+'   '+event);

})



function saveOptions(){
	 showNSFW = _('showNSFW').checked;
	var MSG_from_everybody = _('MSG_from_everybody').checked;
	var mute_v = _('mute_v').checked;
	var loop_v = _('loop_v').checked;
			
		
	if(LoggedIn == "YES"){   
	$.post("/HoodAwards/user/backend/update_options.php",  {i:uID,n:showNSFW,msg:MSG_from_everybody,m:mute_v,l:loop_v}, function(output) {
_('save_option_btn').innerHTML = output;
console.log(uID+"    output  "+"    "+'   '+output);
	});
	}else{
		 opengatewayFunc();
		}
}






function saveNotifications(){
			var nF_e = _('nF_e').value;
			var nF_s = _('nF_s').value;
			var nF_p = _('nF_p').value;
			
			var uFF_e = _('uFF_e').value;
			var uFF_s = _('uFF_s').value;
			var uFF_p = _('uFF_p').value;

			var nMSG_e = _('nMSG_e').value;
			var nMSG_s = _('nMSG_s').value;
			var nMSG_p = _('nMSG_p').value;

			var site_e = _('site_e').value;
			var site_s = _('site_s').value;
			var site_p = _('site_p').value;
			
var send = {i:uID,nfe:nF_e,nfs:nF_s,nfp:nF_p,nufe:uFF_e,nufs:uFF_s,nufp:uFF_p,nme:nMSG_e,nms:nMSG_s,nmp:nMSG_p,sue:site_e,sus:site_s,su_p:site_p};
	if(LoggedIn == "YES"){   
	$.post("/HoodAwards/user/backend/update_notifications.php",  send, function(output) {
_('save_Notifications_btn').innerHTML = output;
	});
	}else{
		 opengatewayFunc();
		}
}


function changePasswordFunc(){
	if(LoggedIn == "YES"){   
	$.post("/HoodAwards/user/backend/change_pw.php",  {i:uID,f:xxx}, function(output) {
_('logout_btn').innerHTML = output;
	});
	}else{
		 opengatewayFunc();
		}
}




































openContain('video_list');



var mybutton = document.getElementById("scrollupbtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if ( document.documentElement.scrollTop > 900 || document.getElementById("followBtnsArea").scrollTop > 200) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function scroll_up_Func(){

document.getElementById('user_info_area').scrollIntoView();


}




						 function oPageContainer(xxx) {
  var ss; 
  var slides = document.getElementsByClassName("page_wrap");

  for (ss = 0; ss < slides.length; ss++) {
      slides[ss].style.display = "none";  
  }

  _(xxx).style.display = "block";  
  scrollFunction();
}
						
					oPageContainer('center_container_content');
						







function openSettingsFunc(xxx){

	if(LoggedIn == "YES"){   
 
 oPageContainer('main_settngs_wrap'); 

//window.location.href='/HoodAwards/user/msgs/index.php
}else{
		 opengatewayFunc();

		}

}



function messageUserFunc(xxx){

	if(LoggedIn == "YES"){   

	window.location.href = "https://www.BlackPeopleMarketplace.com/HoodAwards/messages/?r=" + xxx;

}else{
		 opengatewayFunc();

		}

}



function followUserFunc(xxx,yyyy){
	if(LoggedIn == "YES"){   
	$.post("/HoodAwards/user/backend/follow.php",  {u:uID,f:yyyy}, function(output) {

//_('logout_btn')
xxx.innerHTML = output;
	});
	}else{
		 opengatewayFunc();
		}
}




 function share_profileFunc(){
 
 	var url = "https://www.BlackPeopleMarketplace.com/HoodAwards/user/?u=" + uID;
	if (navigator.share) {
  navigator.share({
    title:  "HoodAwards Videos Coming Soon!",
    text: uName+" Videos",
    url: url
  })
  .then(() => count_share_func(xxx,url))
  .catch(error => console.log('Error sharing:', error));
}
	
 
 }

//console.log("output  "+GuID+'   '+uID);
/*

if(GuID == uID){
document.querySelector('.video_delete').style.display = "block";
}
*/

 function deleteVideoFunc(xxx){
 
 
  if (confirm("Are You Sure you Would like to Delete This Video?")) {


	$.post("/HoodAwards/user/backend/remove.php",  {u:uID,v:xxx}, function(output) {
//xxx.innerHTML = output;
//console.log("output  "+output);

if(output == "DONE"){

var myobj = _("#v"+xxx);
myobj.remove();
}


	});


}

}

 
 
 
 
 
 
 
 
 

document.addEventListener("DOMContentLoaded", function() {
  var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

  if ("IntersectionObserver" in window) {
    var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(video) {
        if (video.isIntersecting) {
          for (var source in video.target.children) {
            var videoSource = video.target.children[source];
            if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
              videoSource.src = videoSource.dataset.src;
            }
          }

          video.target.load();
          video.target.classList.remove("lazy");
          lazyVideoObserver.unobserve(video.target);
        }
      });
    });

    lazyVideos.forEach(function(lazyVideo) {
      lazyVideoObserver.observe(lazyVideo);
    });
  }
});

 
 
 
 
 
 
 
 
 
 
 

</script>



</html>