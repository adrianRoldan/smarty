
$(document).ready(function() {

    var socket = new WebSocket("ws://127.0.0.1:10000/listencloud");

    socket.onopen = function () {
        console.log("La conexión se ha establecido");
    };

    socket.onclose = function (event) {
        if (event.wasClean) {
            console.log('Conexión cerrada limpiamente');
        } else {
            console.log('Conexiones rotas');
        }
        console.log('Codigo: ' + event.code + ' motivo cierre: ' + event.reason);
    };

    socket.onmessage = function (event) {
        console.log("Mensaje recibido: " + event.data);
        data = JSON.parse(event.data);

        $.get("dispositivo/get/"+data.dispositivo_id, function(result) {
            $('#cloudlogs').prepend('<tr class="text-left">\
                    <td>'+result.nombre+' ('+result.ip+':'+result.puerto+')</td>\
                    <td>'+data.mensaje+'</td>\
                    <td>'+data.fechaEnvio+'</td>\
                    <td>Obteniendo...</td>\
                </tr>');
        });
    };

    socket.onerror = function (error) {
        console.log("Error " + error.message);
    };
});