var io = require('socket.io')(8080);
io.on('connection', function (socket) {

    console.log('Conectado');

    socket.on('disconnect', function (socket) {

        console.log('Desconectado');

    });

});