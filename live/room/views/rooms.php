
<?php
$roomType = '';
	if(isset($_GET['r'])){
			$room = $_GET['r'];
			$id = $_GET['id'];
		}





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


<script src="/HoodAwards/Includes/js/socket.io-3.0.1.min.js"> </script>
			  
			   <script src="/HoodAwards/Includes/js/socket.io-3.0.1.min.js"> </script>
			  <script src="../public/script.js" defer></script>
			  
			  
<script>

					function _(id){ return document.getElementById(id); }

    //const ROOM_ID = "<%= roomId %>"
 var  roomId = "4";

 var ROOM_ID = "4";
    
	
			//	var userId = Math.floor(Math.random() * 30) + 1;
 
	console.log("ROOM_ID  "+ROOM_ID+"     ")
	//console.log("userId   ")
	
	
	 </script>


<script type="module"     
require = require("esm")(module/*, options*/)
module.exports = require("./server.js")     
const io = require("socket.io-client")(3000, {cors: { orgin: ['107.180.2.245:3000']}})
></script>

  <script>
  					

//var io = require('socket.io')(3001, {cors: { orgin: ['107.180.2.245:3001']}})


//const socket = io("https://www.blackpeoplemarketplace.com", {path: "/HoodAwards/live/room/socket.io"});

//const socket = io("https://www.blackpeoplemarketplace.com/HoodAwards/live/room/");



const socket = io("https://www.blackpeoplemarketplace.com", {
  path: "/HoodAwards/live/room"
});

//var  socket = io('https://www.blackpeoplemarketplace.com',{transports: ['websocket']})
//var socket = io.connect('maximusbrand.com');

 socket.on('connection')
 
 
 


 

</script>
  <title>Document</title>
  <style>
    #video-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, 300px);
      grid-auto-rows: 300px;
    }
    
    video {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
</head>
<body>
  <div id="video-grid"></div>
  <div id="room#"></div>
  
</body>
</html>

<script>
 _('room#').innerHTML = ROOM_ID;
	 </script>