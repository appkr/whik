var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);

server.listen(8082, function () {
  console.log('A server is running at https://' + process.env.C9_HOSTNAME + ':8082');
});

app.get('/', function (request, response) {
  response.sendFile(__dirname + '/index.html');
});

io.on('connection', function (socket) {
  // When client and server has a connection

  io.emit('chat.info', 'A new user just came in~');

  socket.on('chat.message', function (message) {
    // The server is listening 'chat.message' event from any client
    // And when that happens, the server will accept the 'message(event data)
    // And then broadcasts the 'message' out to all various connections.
    io.emit('chat.message', message);
  });

  socket.on('chat.info', function (info) {
    io.emit('chat.info', info);
  });

  socket.on('disconnect', function () {
    io.emit('chat.info', 'A user left the room!');
  });
});