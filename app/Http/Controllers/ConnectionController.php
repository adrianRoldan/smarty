<?php

namespace App\Http\Controllers;

use App\Socket\ClientSocket;
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

        return view('cloud');
    }


    public function sendToCloud(Request $request){

        $socket = new ClientSocket(Config::get("adresses.cloud.ip"), Config::get("adresses.cloud.port"));
        $socket->send_data('Hello World');
        $response = $socket->read_data();
        $socket->close_socket();

        echo $response;
    }
}
