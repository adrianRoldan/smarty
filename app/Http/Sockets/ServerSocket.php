<?php namespace App\Http\Sockets;

use App\CommunicationLog;
use Illuminate\Support\Facades\Config;
use Orchid\Socket\BaseSocketListener;
use Ratchet\ConnectionInterface;

class ServerSocket extends BaseSocketListener {

 protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
    }

    public function onMessage(ConnectionInterface $from, $msg) {

        $log = new CommunicationLog(json_decode($msg, true));
        $log->save();

        $from->send("OK");
        logger("Recibido el mensaje '".$msg."' del CLOUD");

        // Por si hubiera mas clientes contectados, ademas del CLOUD. Por ejemplo el front-end ajax
        foreach ($this->clients as $client) {
            if ($from != $client) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        logger("ERROR en socket cloud -> front: ".$e);
        $conn->close();
    }

}