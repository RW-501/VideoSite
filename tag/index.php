		<?php

	if(isset($_GET['tag'])){
			$TAG = $_GET['tag'];
		$TAGs = strtoupper($TAG);
		//	echo'xxxxxxxxxxxxxxxxxxxxxxxxxxxxx'. $TAGs;
		
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- saved from url=(0033)https://www.BlackPeopleMarketplace.com -->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />


<title><?php echo $TAGs; ?> StreetzWatching</title>
	
<meta name="description" content="Hood Awards">
	
<meta name="keywords" content="Hood Awards ">

<meta name="Distribution" content="Global" />

<meta name="Rating" content="General" />

<meta name="Robots" content="INDEX,FOLLOW" />

<meta name="Revisit-after" content="1 Day" />

<style type="text/css" media="all">

<!--



@import url("/HoodAwards/tag/indexCSS.css");
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
		
		<div id="left_side_container">	
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
			
		
		
				<div id="center_container">		
				
				
				<section id="pagetag_title"> Videos Tagged With #<?php echo $TAGs; ?>... </section>
	
			 					<?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/tag/tagsvideofeed.php";
   include($path);
   
   ?>						
		
				
				
			
				
				
				</div>
				
				
				
				
				
				
				<div id="right_side_container">		</div>
				
				
		</div>
		
		
		
		     <div id='addvideobtn'  onclick="add_video_func();" ><i class="fa fa-plus-circle"></i></div> 


<script>
function _(id){ return document.getElementById(id); }
// onclick='clicked_video_func($videoID)';

var uID = _('uID').value;
var current_Video;







						
</script>
		
			<script src="/HoodAwards/Includes/main/v_player_js/index.js"></script>

		
</body>
</html>
