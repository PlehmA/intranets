const express = require('express')
const app = express()
const http = require('http').Server(app)
const io = require('socket.io')(http)

io.on('connection', (socket) => {
    console.log('Conectado')
})

http.listen(9003, () => console.log('Listening on port 8888'))