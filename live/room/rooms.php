
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


			   <script defer src="https://unpkg.com/peerjs@1.2.0/dist/peerjs.min.js"></script>
		
			   
			  
			<script src="https://blackpeoplemarketplace.com/HoodAwards/live/room/node_modules/socket.io/client-dist/socket.io.js"></script>

<script>

					function _(id){ return document.getElementById(id); }

    //const ROOM_ID = "<%= roomId %>"
 var  roomId = "4";

 var ROOM_ID = "4";
  //  var socket = io('https://yourDomain:3000', { transports : ['websocket'] });

	
			var userId = Math.floor(Math.random() * 30) + 1;
 

	//console.log("userId   ")
	

//import { io } from "socket.io-client";


//var socket = io.connect('');


//(3000, {cors: { orgin: ['107.180.2.245:3000']}})
//var io = require('socket.io')(3001, {cors: { orgin: ['107.180.2.245:3001']}})

//var socket = io("https://blackpeoplemarketplace.com", {path: "/HoodAwards/live/room/"});
//var socket = io();

//const socket = io("https://www.blackpeoplemarketplace.com");
//   "Access-Control-Allow-Credentials": "true"
  // "Access-Control-Allow-Headers": "Origin, X-Requested-With, Content-Type, Accept"
  // "Access-Control-Allow-Origin": "https://www.blackpeoplemarketplace.com" //The ionic server
//const socket = require("socket.io-client")("https://blackpeoplemarketplace.com:3000/HoodAwards/live/room");
//import io from 'socket.io-client'
//import { io } from "socket.io-client";


var socket = io('', {
port: 3000, host: '107.180.2.245',
  path: "/HoodAwards/live/"
});



var sID = socket.id;
	console.log("ROOM_ID  "+sID+"     ")

socket.on("connection", () => {

  console.log(socket.id); // ojIckSD2jqNzOqIrAGzL
});
 


//var  socket = io('https://www.blackpeoplemarketplace.com/HoodAwards/live/room',{transports: ['websocket']})
//var socket = io.connect();

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
 
 socket.on("connect_error", (err) => {
  console.log(`connect_error due to ${err.message}`);
});



 	console.log("ROOM_ID  "+ROOM_ID+"     ")
	console.log("userId  "+userId+"     ")
	 </script>
	 
	 	 <script src="../room/public/script.js" defer></script>

	 
	 