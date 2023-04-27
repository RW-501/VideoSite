<?php
$roomType = '';
	if(isset($_GET['r'])){
			$roomType = $_GET['r'];
		}

if($roomType == 'Private'){

}
if($roomType == 'Public'){

}




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>StreetzWatchin</title>
	
<meta name="description" content="Hood Awards">
	
<meta name="keywords" content="Hood Awards ">

<meta name="Distribution" content="Global" />

<meta name="Rating" content="General" />

<meta name="Robots" content="INDEX,FOLLOW" />

<meta name="Revisit-after" content="1 Day" />

<style type="text/css" media="all">

<!--


@import url("/HoodAwards/live/room/indexCSS.css");



-->

</style>

	
</head>

<body>
 <?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/header/header.php";
   include($path);
   ?>
 <div id="page_container">
		
		<div id="left_side_container">		</div>
		
				<div id="center_container">	
				
				
					
				<?php
				if($roomType == 'Private'){
echo 'Private Room';

}
if($roomType == 'Public'){
echo 'public Room';
}




?>

  <script>
    const ROOM_ID = "<%= roomId %>"
  </script>
  
    	<script src='/HoodAwards/live/room/server.js'></script>

  <script src="/socket.io/socket.io.js" defer></script>
<script src="../room/public/script.js" defer></script>




  <div id="video-grid"></div>























				
				</div>
				
				
				
				
				<div id="right_side_container">

				
				
						</div>
				
				
				</div>


		
</body>
<script>
				
					function _(id){ return document.getElementById(id); }

			var uIP = _('uIP').value;





























/*
<video id='vid' autoplay></video>

navigator.mediaDevices.getUserMedia({
video:{
width: 1280,
height:720
}
})
.then(stream=>{
document.getElementById('vid').srcObject = stream;
})
*/

</script>



</html>