
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


@import url("/HoodAwards/live/indexCSS.css");



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
				
				
				<div id='create_roomContainer' >
				
				<div id='create_PrivateRoomBtn' class='createRoomsBtns' onclick="create_roomBtnFunc('Private')">Create Private Room</div>
				<div id='create_PublicRoomBtn'  class='createRoomsBtns'  onclick="create_roomBtnFunc('Public')">Create Public Room</div>
				
				 </div>
				 
				<div id='public_roomsLable'>
				<div>Public Rooms</div>
				</div>
				
				
				
				<div class='public_roomsContainer' onclick="goto_roomBtnFunc('1')">
				<div>Main Public Room</div><div>765 online</div>
				</div>
				
				</div>

				
				
				<div id="right_side_container">		</div>
				
				
				</div>


		

				
</body>
<script>
				
					function _(id){ return document.getElementById(id); }

			var uIP = _('uIP').value;



				
	function create_roomBtnFunc(xxx){
		
	window.location.href = "https://www.BlackPeopleMarketplace.com/HoodAwards/live/settings/index.php?r=" + xxx;

	}
				
				
				function goto_roomBtnFunc(xxx,yyy){
		var yyy = uIP;
		var xxx = '1';
	//window.location.href = "https://www.BlackPeopleMarketplace.com/HoodAwards/live/room/index.php?r=" + xxx;
	//window.location.href = "https://www.blackpeoplemarketplace.com/HoodAwards/live/room/index.js";
//	window.location.href = "https://www.blackpeoplemarketplace.com/HoodAwards/live/room/views/rooms.php?r=" + xxx+"%id="+yyy;
//window.location.href = "https://www.blackpeoplemarketplace.com/HoodAwards/live/room";
	window.location.href = "https://www.blackpeoplemarketplace.com/HoodAwards/live/main";

	}	
				
				

</script>



</html>