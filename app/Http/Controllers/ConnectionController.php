<?php

namespace App\Http\Controllers;

use App\CommunicationLog;
use App\Components\phpMQTT;
use App\Dispositivo;
use App\Http\Sockets\ClientSocket;
use App\Http\Sockets\SuscriptorMqtt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class ConnectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }


    public function cloud(){

        $logs = CommunicationLog::orderBy("created_at", "desc")->orderBy("fechaEnvio", "desc")->get();
        return view('cloud', compact('logs'));
    }

    public function broker() {
        return view('gestor');
    }


    public function sendToCloud(Request $request){

        $socket = new ClientSocket(Config::get("adresses.cloud.ip"), Config::get("adresses.cloud.port"));
        $socket->send_data('Hola cloud, soy el front-end');
        $response = $socket->read_data();
        $socket->close_socket();

        echo $response;
    }

    public function sendToMosquitto(){

        //Busca en la base de datos el dispositivo con id 2. En este caso es el broker 1
        $broker = Dispositivo::find(2);

        // Instancia a la clase phpMQTT. Datos: ip del broker, puerto del protocolo mqtt y Id unico para el front-end
        $mqtt = new phpMQTT($broker->ip, config('app.mqtt_port'), config("app.publisher_mqtt_id"));
        $mqtt->keepalive = 60;

        if ($mqtt->connect()) { // Prueba de conectar
            $mqtt->publish("trafico/emergencia", "Hello World!!!!!!",0);    // Publica en el topico el mensaje
            $mqtt->close();
        }else{
            logger("Error con la conexión con Mosquitto. Publicador");  // Registra en el archivo laravel.log en caso de error de conexión
        }
    }
}
