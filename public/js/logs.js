$(document).ready(function() {

    mqtt.init();    // Inicializamos funcionalidad de comunicacion

});

/**
 * Funciones del protocolo MQTT implementado con websockets
 * @type {{init: mqtt.init, onConnect: mqtt.onConnect, onMessageArrived: mqtt.onMessageArrived,
 * processTopic: mqtt.processTopic, onConnectionLost: mqtt.onConnectionLost}}
 */
var izquierda = false;
var client; //variable global que mantiene una unica conexión con el broker (tanto para suscribirse como para publicar)
mqtt = {

    /**
     * Inicializa los websockets y define funciones callbacks de eventos mqtt
     */
    init: function () {

        // Crea una instancia de cliente WEBSOCKET con la Ip del broker, el puerto del protocolo websocket (dentro de mqtt) y ID unico
        client = new Paho.MQTT.Client("192.168.43.54", 1884, "front-end-logs");

        // define allback handlers. Funciones que se ejecutaran en los eventos de perdidad de conexion y mensaje recibido
        client.onConnectionLost = mqtt.onConnectionLost;
        client.onMessageArrived = mqtt.onMessageArrived;

        // Conecta con el broker
        client.connect({onSuccess:mqtt.onConnect});
    },



    /**
     * Evento que se lanza al realizarse la conexión con el broker correctamente
     */
    onConnect : function() {

        console.log("Conectado el registro de logs");   // Registro de conexion
        // Sucripción a topicos
        //client.subscribe("trafico/emergencia");
        //client.subscribe("trafico/ambulancia");
        client.subscribe("trafico/ambulancia");
        client.subscribe("trafico/semaforo");
    },



    /**
     * Se lanza cuando recibe un mensaje de cualquier topico suscrito
     * @param message
     */
    onMessageArrived : function(message) {

        console.log(message.destinationName+": "+message.payloadString);
        // Procesa el topico
        procedencia = mqtt.processTopic(message.destinationName, message.payloadString);
        data = JSON.parse(message.payloadString);

        $('#mqttlogs').prepend('<tr class="text-left">\
                <td>'+procedencia+'</td>\
                <td>'+message.destinationName+'</td>\
                \<td>'+message.payloadString+'</td>\
                <td></td>\
                <td>Obteniendo...</td>\
            </tr>');

        console.log(message.destinationName+": "+message.payloadString);
    },



    /**
     * Procesa el topico y realiza la acción correspondiente
     * @param topic
     * @param msg
     */

    processTopic : function(topic, msg){

        var procedencia;
        // Parseamos datos json recibidos
        //msg = JSON.parse(msg);
        switch(topic){
            case "trafico/emergencia":
                break;
            case "trafico/ambulancia":
                procedencia = "Ambulancia";
                break;
            case "trafico/semaforo":
                procedencia = "Semáforo";
                break;
            case "emergency/alerts":
                procedencia = "Móvil";
                break;
            default:
                alert("Tópico no registrado");
        }

        return procedencia;
    },



    /**
     * Evento que se lanza cuando se pierde la conexión. Registra el motivo de la desconexión.
     * @param responseObject
     */
    onConnectionLost : function(responseObject) {

        if (responseObject.errorCode !== 0) {
            console.log("onConnectionLost:" + responseObject.errorMessage);
        }
    }
};