<?php

namespace App\Http\Controllers;

use App\CommunicationLog;
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


    public function sendToCloud(Request $request){

        $socket = new ClientSocket(Config::get("adresses.cloud.ip"), Config::get("adresses.cloud.port"));
        $socket->send_data('Hello World');
        $response = $socket->read_data();
        $socket->close_socket();

        echo $response;
    }
}
