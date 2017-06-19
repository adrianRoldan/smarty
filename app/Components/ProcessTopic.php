<?php

namespace App\Components;

use App\CommunicationLog;
use App\Http\Controllers\ConnectionController;
use App\Http\Sockets\ClientSocket;
use Illuminate\Support\Facades\Config;

class ProcessTopic
{

    public function semaforo($topic, $msg){

        $msgJson = json_decode($msg);
        $log = new CommunicationLog(["mensaje" => $msg,
                                    "topico" => $topic,
                                    "logueable_id" => 1,
                                    "logueable_type" => "App\Nodo",
                                    "fechaEnvio" => $msgJson->fechaEnvio]);
        $log->save();
    }


    public function ambulancia($topic, $msg){

        $msgJson = json_decode($msg);
        $log = new CommunicationLog(["mensaje" => $msg,
                                     "topico" => $topic,
                                     "logueable_id" => 4,
                                     "logueable_type" => "App\Nodo",
                                     "fechaEnvio" => $msgJson->fechaEnvio]);
        $log->save();
    }

    public function app($topic, $msg){

        $msgJson = json_decode($msg);
        $log = new CommunicationLog(["mensaje" => $msg,
            "topico" => $topic,
            "logueable_id" => 5,
            "logueable_type" => "App\Nodo",
            "fechaEnvio" => date("Y-m-d")]);
        $log->save();

        // To Cloud
        ConnectionController::sendToCloud($msg);
        /*$socket = new ClientSocket("192.168.43.80", 10000);
        $socket->send_data($msg);
        $response = $socket->read_data();
        $socket->close_socket();*/
    }
}