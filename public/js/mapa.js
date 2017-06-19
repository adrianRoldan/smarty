
// Cuando carga la pagina
$(document).ready(function() {

    mqtt.init();    // Inicializamos funcionalidad de comunicacion
    cambio_estado.init(); // Inicializamos funcionalidad de cambio de estado manual

});

/**
 * Funciones del protocolo MQTT implementado con websockets
 * @type {{init: mqtt.init, onConnect: mqtt.onConnect, onMessageArrived: mqtt.onMessageArrived,
 * processTopic: mqtt.processTopic, onConnectionLost: mqtt.onConnectionLost}}
 */

var client; //variable global que mantiene una unica conexión con el broker (tanto para suscribirse como para publicar)
mqtt = {

    /**
     * Inicializa los websockets y define funciones callbacks de eventos mqtt
     */
    init: function () {

        // Crea una instancia de cliente WEBSOCKET con la Ip del broker, el puerto del protocolo websocket (dentro de mqtt) y ID unico
        client = new Paho.MQTT.Client("", 1884, "front-end-mapa");

        // define allback handlers. Funciones que se ejecutaran en los eventos de perdidad de conexion y mensaje recibido
        client.onConnectionLost = mqtt.onConnectionLost;
        client.onMessageArrived = mqtt.onMessageArrived;

        // Conecta con el broker
        try {
            client.connect({
                onSuccess : mqtt.onConnect,
                onFailure : mqtt.onFailure,
                hosts : ["192.168.61.43", "192.168.61.43"],
                ports : [1884, 1884]
            });
        }
        catch(err) {
            console.log("Error de conexion al broker "+err);
        }

    },



    /**
     * Evento que se lanza al realizarse la conexión con el broker correctamente
     */
    onConnect : function() {

        console.log("Conetado al broker");   // Registro de conexion
        // Sucripción a topicos
        //client.subscribe("trafico/emergencia");
        //client.subscribe("trafico/ambulancia");
        client.subscribe("trafico/ambulancia");
        client.subscribe("trafico/estado");
        client.subscribe("emergency/alerts");
    },



    /**
     * Evento que se lanza al fallar la conexion con el broker
     */
    onFailure : function(errorMessage){
        console.log("Broker no encontrado. "+errorMessage);
        mqtt.init();
    },



    /**
     * Se lanza cuando recibe un mensaje de cualquier topico suscrito
     * @param message
     */
    onMessageArrived : function(message) {

        // Procesa el topico
        mqtt.processTopic(message.destinationName, message.payloadString);
        console.log(message.destinationName+": "+message.payloadString);
    },



    /**
     * Procesa el topico y realiza la acción correspondiente
     * @param topic
     * @param msg
     */

    processTopic : function(topic, msg){


        nopint = false;
        // Parseamos datos json recibidos
        msg = JSON.parse(msg);
        switch(topic){
            case "emergency/alerts":
                //Accion ha realizar en la vista de la aplicacion (mapa)
                break;
            case "trafico/ambulancia":
                // Elimina rastro de movimiento de la ambulancia
                $('.street').html("").css("background-color", "#D8D8D8");
                if($('#'+msg['ubicacion_x']+"_"+msg['ubicacion_y']).html() == "")
                    // Muestra la ambulancia en el mapa a partir de su ubicacion
                    $('#'+msg['ubicacion_x']+"_"+msg['ubicacion_y']).html("<img class='ambulancia' src='css/ambulancia.png' />");


                break;
            case "trafico/estado":
                // Cambia de estado en el front del semaforo que ha enviado su estado
                $('#'+msg['id']).css("background-color", msg['estado']);
                break;
            default:
                alert("Tópico no registrado");
        }
    },



    /**
     * Evento que se lanza cuando se pierde la conexión. Registra el motivo de la desconexión.
     * @param responseObject
     */
    onConnectionLost : function(responseObject) {

        if (responseObject.errorCode !== 0) {
            console.log("onConnectionLost:" + responseObject.errorMessage);
            mqtt.init();
        }
    }
};




cambio_estado = {

    init : function(){

        var idNodo;
        var idSem;
        $('.nodo').on("click", function(){
            // Obtenemos identificador unico del nodo
            idNodo = $(this).data("id");
            idSem = $(this).data("idSem");
            ubicacion = $(this).parent().attr("id");
            // Obtenemos objeto nodo
            $.get("/nodo/get/"+idNodo, function(nodo) {
                $('#modalEstado').find(".modal-title").text(nodo.nombre + " (" + nodo.client_mqtt_id + ")");
                $('#modalEstado').find(".ip").text(nodo.ip);
                $('#modalEstado').find(".mac").text(nodo.mac);
                $('#modalEstado').find(".ubicacion").text(ubicacion);
                $('#modalEstado').find(".nombre").text(nodo.nombre);
                $('#modalEstado').modal();  // Abre modal
            });
        });


        $('#save').click(function(){

            idSem =
            nuevoEstado = $('#estado').val();

            if(nuevoEstado != ""){

                data = JSON.stringify({
                    "id" : "semaforo_105",
                    "estado" : nuevoEstado
                });

                $.ajax({
                    url: "/broker/send",
                    type: "POST",
                    data: {
                        "topico": "frontend",
                        "mensaje" : JSON.stringify({
                                        "id" : "semaforo_105",
                                        "estado" : nuevoEstado,
                                        "topico" : "trafico/cambia_estado"
                                    })
                    },
                    success: function (result) {
                    }
                });
            }
            $('#modalEstado').modal('toggle');
        });
    },


    enviarSos : function(){

        // Creamos instancia al objeto Messaje con el mensaje
        message = new Paho.MQTT.Message("sos");
        // ublicamos en el topico que corresponda
        message.destinationName = "trafico/semaforos";
        // enviamos el mensaje al topico
        client.send(message);
    }
};
