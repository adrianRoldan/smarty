<?php

namespace App\Http\Controllers;

use App\CommunicationLog;
use App\Http\Sockets\ClientSocket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use phpMQTT;


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

    public function sendToMosquitto(Request $request){

        $mqtt = new phpMQTT("192.168.1.46", 1883, "phpMQTT Pub Example"); //Change client name to something unique

        if ($mqtt->connect()) {
            $mqtt->publish("bluerhinos/phpMQTT/examples/publishtest","Hello World! at ".date("r"),0);
            $mqtt->close();
        }
        echo "alo";
    }


}
