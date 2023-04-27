	<?php
	if(isset($_POST['i'])){
			$log_Id = $_POST['i'];
			echo log_Id;


//$uID = log_Id;

$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
   			function viewTagsFunc($input){

$pattern ="/#\w+/";

if(preg_match_all($pattern, $input, $matches)) {
}
if($matches > 0){
foreach($matches as $x => $x_valuex) {
}
foreach($x_valuex as $yy => $Wordx) {
	$Word = ltrim($Wordx, '#');
$Tag = "<strong class='tags' onclick=window.location.href='/HoodAwards/tag/index.php?tag=$Word'>$Wordx</strong>";
		$videoTitle = str_replace($Wordx, $Tag, $input);		
		$input = $videoTitle;
}
return $input;
}
}

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

// true means show Not safe foe work
			if($show_NSFW == 'true'){
		$show_NSFWOP = "AND SFW_bool ='YES' or SFW_bool ='NO' and videoDeletedBOOL ='NO'";
		}else{ $show_NSFWOP = "";
		}



   $ii = $ii + 10;
   
   }

						//get_search_infoFunc($uID);	 				

		
	
		//	$query0 =  "SELECT * FROM videoInfoTable Left JOIN activityTable on videoInfoTable.videoID = activityTable.videoID  WHERE videoDeletedBOOL ='NO' AND  videoDeletedBOOL ='NO' order by videoUploadDate DESC LIMIT 10";
			
						//$query0 =  "SELECT * FROM videoInfoTable Where videoID NOT IN (Select videoID from activityTable) order by videoInfoTable.videoUploadDate DESC LIMIT 10"
	 $queryX =  "SELECT * FROM videoInfoTable  WHERE videoDeletedBOOL ='NO'AND publicbool ='YES' AND SFW_bool ='YES' $show_NSFWOP AND publicbool ='YES'  order by videoUploadDate desc, videoViews asc  LIMIT 20"; 
						
						//JOIN activityTable on videoInfoTable.videoID = activityTable.videoID  WHERE videoDeletedBOOL ='NO' AND  videoDeletedBOOL ='NO' order by videoUploadDate DESC LIMIT 10";



				
//  
?>
					<style type="text/css" media="all">

<!--


@import url("https://www.blackpeoplemarketplace.com/HoodAwards/index/slideshowCSS.css");
@import url("https://www.blackpeoplemarketplace.com/HoodAwards/Includes/main/v_player_elemets/v_playerCSS.css");


-->

</style>
	<div id="feed_container">		

			 					<?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/main/videoplayer.php";
   include($path);
   
   ?>						
		</div>
		
						<script src="/HoodAwards/index/slideshow.js"></script>
