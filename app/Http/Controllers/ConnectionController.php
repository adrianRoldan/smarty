<?php

namespace App\Http\Controllers;

use App\CommunicationLog;
use App\Components\phpMQTT;
use App\Http\Sockets\ClientSocket;
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

        $mqtt = new phpMQTT("192.168.1.49", 1883, "front-end"); //Change client name to something unique
        $mqtt->keepalive = 60;

        if ($mqtt->connect()) {
            $mqtt->publish("trafico/emergencia", "Hello World!!!!!!",0);
            $mqtt->close();
        }else{
            logger("Error con la conexión con Mosquitto. Publicador");
        }
    }


    public function bindMosquitto(){

        $mqtt = new phpMQTT("192.168.1.49", 1883, "front-end"); //Change client name to something unique
        if(!$mqtt->connect()){
            logger("Error con la conexión con Mosquitto. Suscriptor");
            exit(1);
        }
        $topics['trafico/emergencia'] = array("qos"=>0, "function"=>"procmsg");
        $mqtt->subscribe($topics,0);

        while($mqtt->proc()){}

        $mqtt->close();
    }

    function procmsg($topic, $msg){
        logger( "Msg Recieved: ".date("r")."\nTopic:{$topic}\n$msg\n");
    }
}
