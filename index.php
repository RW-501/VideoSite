

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- saved from url=(0033)https://www.BlackPeopleMarketplace.com -->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />

<title>StreetzWatching</title>
	
<meta name="description" content="Hood Awards">
	
<meta name="keywords" content="Hood Awards ">

<meta name="Distribution" content="Global" />

<meta name="Rating" content="General" />

<meta name="Robots" content="INDEX,FOLLOW" />

<meta name="Revisit-after" content="1 Day" />

<style type="text/css" media="all">

<!--



@import url("/HoodAwards/indexCSS.css");
@import url("/HoodAwards/Includes/main/feed_CSS.css");




-->

</style>

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



</head>

<body>
 		
<div id="page_container">
		
	<div id="left_side_container">		</div>
		
<div id="center_container">	

					<div id='feedtop'>
					     <button class='feedbtn'  onclick="default_feed_func();" >Following</button>  
					     <div class='feedbtn' >|</div>  
						 <button class='feedbtn'  onclick="global_func();" >Explore</button> 

					</div>

<?php						
$query = "SELECT * FROM  UserOptionsTable  WHERE userOptions_UserID = $uID Limit 1";
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

// true means show Not safe foe work
		if($show_NSFW == 'true'){
		$show_NSFWOP = "AND SFW_bool ='YES' or SFW_bool ='NO' and videoDeletedBOOL ='NO'";
		}else{ $show_NSFWOP = "";
		}
		
		?>
			
		

	
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/HoodAwards/Includes/main/videofeed.php";
include($path);   
?>	
   			
				
</div>
				
		
	<div id="right_side_container">		</div>
				
				
</div>

		
     <button id='checkMSGbtn'  onclick="check_MSG_func();"  class="fa fa-envelope"></button> 
	 
     <button id='addvideobtn'  onclick="add_video_func();"  class="fa fa-plus-circle"></button> 


<script>

// onclick='clicked_video_func($videoID)';

var uIP = _('uIP').value;
var uID = _('uID').value;
var current_Video;



//loadVideosFunc();

function default_feed_func(){
alert("default_feed_func ");
}

function global_func(){
alert("global_func ");
}




if(uID == "" || uID == null){
_('checkMSGbtn').style.display = 'none';
}else{
_('checkMSGbtn').style.display = 'block';
}




window.addEventListener('load', (event) => {
console.log("event  1"+event);
});

document.addEventListener('readystatechange', (event) => {
console.log("event  2"+event);
});

document.addEventListener('DOMContentLoaded', (event) => {
console.log("event  3"+event);
});

window.onload = (event) => {
console.log('The page has fully loaded');
};





												
						</script>
						
												<script src="/HoodAwards/Includes/main/v_player_js/index.js"></script>

						
				
	<script>
	
	









	
</script>
			
	
				

		
</body>
</html>
