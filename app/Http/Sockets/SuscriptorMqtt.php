<?php

namespace App\Http\Sockets;

use App\Components\phpMQTT;

class SuscriptorMqtt extends phpMQTT
{
    public $mqtt;


    public function __construct($host, $port, $id, $keepAlive){

        $this->mqtt = new phpMQTT($host, $port, $id); //Change client name to something unique
        $this->mqtt->keepalive = $keepAlive;
    }

    public function conectar(){

        if(!$this->mqtt->connect()){
            logger("Error con la conexión con Mosquitto. Suscriptor");
            exit(1);
        }else{
            logger("Escuchando ".$this->mqtt->address."::".$this->mqtt->port."...");
        }
    }

    public function suscribirse($topics)
    {

        $this->mqtt->subscribe($topics, 0);

        while ($this->mqtt->proc()) {
        }

        $this->mqtt->close();
    }
}