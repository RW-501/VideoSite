var express = require('express');
var app = express();

var bodyParser = require('body-parser');
app.use(bodyParser.json({type: '*/*'}));
var server = require('http').createServer(app);
 app.get('rooms', function(req, res){
   //WRITE SOCKET SERVER CODE HERE?
 });


var io = require('socket.io')(server);


server.listen(process.env.PORT || '107.180.2.245:3000', () => {
  console.log('listening on *:30999100')
});


    console.log(server)


/*//var io = require('socket.io')(server);
const io = require("socket.io")(server, {
port: 3009, host: '198.71.227.25',
  path: "/HoodAwards/"
});

io.sockets.on('connection', function(socket) {

	// Convenience function to log server messages on the client.
	// Arguments is an array like object which contains all the arguments of log(). 
	// To push all the arguments of log() in array, we have to use apply().
	function log() {
	  var array = ['Message from server:'];
	  array.push.apply(array, arguments);
	  socket.emit('log', array);
	}
  
    
    //Defining Socket Connections
    socket.on('message', function(message, room) {
	  log('Client said: ', message);
	  // for a real app, would be room-only (not broadcast)
	  socket.in(room).emit('message', message, room);
	});
  
	socket.on('create or join', function(room) {
	  log('Received request to create or join room ' + room);
  
	  var clientsInRoom = io.sockets.adapter.rooms[room];
	  var numClients = clientsInRoom ? Object.keys(clientsInRoom.sockets).length : 0;
	  log('Room ' + room + ' now has ' + numClients + ' client(s)');
  
	  if (numClients === 0) {
		socket.join(room);
		log('Client ID ' + socket.id + ' created room ' + room);
		socket.emit('created', room, socket.id);
  
	  } else if (numClients === 1) {
		log('Client ID ' + socket.id + ' joined room ' + room);
		io.sockets.in(room).emit('join', room);
		socket.join(room);
		socket.emit('joined', room, socket.id);
		io.sockets.in(room).emit('ready');
	  } else { // max two clients
		socket.emit('full', room);
	  }
	});
  
	socket.on('ipaddr', function() {
	  var ifaces = os.networkInterfaces();
	  for (var dev in ifaces) {
		ifaces[dev].forEach(function(details) {
		  if (details.family === 'IPv4' && details.address !== '127.0.0.1') {
			socket.emit('ipaddr', details.address);
		  }
		});
	  }
	});
  
	socket.on('bye', function(){
	  console.log('received bye');
	});
  
  });

*/





app.use(express.static('public'))

app.use(express.static('/HoodAwards/live/room/node_modules'));
app.use(express.static('/HoodAwards/live/room/'));




io.on('connection', socket => {
  socket.on('join-room', (roomId, userId) => {
    socket.join(roomId)
    socket.to(roomId).broadcast.emit('user-connected', userId)
    console.log("connected");

    socket.on('disconnect', () => {
      socket.to(roomId).broadcast.emit('user-disconnected', userId)
    })
  })
})



io.sockets.on('connection', function (socket) {
  socket.emit('news', { hello: 'world' });
  socket.on('my other event', function (data) {
    console.log(data);
  });
});




io.on('connection', function(client) {
    console.log("connected");
   client.emit("message", "Some thing to show");
});
//var io = require('socket.io')(server, {cors: { orgin: "*"}});

//const io = require("socket.io")(server, {cors: { orgin: "https://www.blackpeoplemarketplace.com",
  // path: "/"
							//	}});



//app.set('port','http://198.71.227.25:3000/HoodAwards/live/room')


io.on("connection", (socket) => {
  console.log(socket.id); // ojIckSD2jqNzOqIrAGzL
});


 io.on("connection", (socket) => {
  socket.broadcast.emit("hello", "world");
});
 
 io.on('message', function(message) {
  console.log(message);
});
 
io.on("connection", (socket) => {
  socket.on("list items", async (callback) => {
    try {
      const items = await findItems();
      callback({
        status: "OK",
        items
      });
    } catch (e) {
      callback({
        status: "NOK"
      });
    }
  });
});


