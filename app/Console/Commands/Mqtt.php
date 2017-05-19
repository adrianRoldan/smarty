
<?php

/**
 *  UTILIZACION: en la raiz del proyecto ejecutar $ php artisan mqtt:subscribe
 *
 * Se suscribe a los topicos definidos en el array $topics. Cuando recibe un mensaje,
 * procesa el topico y segun este, ejecuta una funcion u otra (clase ProcessTopic)
 */

namespace App\Console\Commands;

use App\Dispositivo;
use App\Http\Sockets\SuscriptorMqtt;
use Illuminate\Console\Command;

class Mqtt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqtt:subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bind to broker mqtt';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Codigo que se ejecuta cuando se ejecuta el comando por consola (php artisan mqtt:subscribe
     *
     * @return mixed
     */
    public function handle()
    {
        // Buscamos el broker (id: 2)
        $broker = Dispositivo::find(2);
        // Hacemos una instancia a lainterficie SuscriptorMqtt que a su vez hace una instancia al componente phpMQTT
        $suscriptorMqtt = new SuscriptorMqtt($broker->ip, $broker->puerto, config("app.subcriptor_mqtt_id"), 60);
        // COnnecta con el broker
        $suscriptorMqtt->conectar();

        // Array que guarda los topicos para suscribirse y las funciones a ejecutar en cada topico despues de recibir un mensaje
        $topics['trafico/emergencia'] = array("qos"=>0, "function"=>"trafico");
        //$topics['emergencia'] = array("qos"=>0, "function"=>"emergencia");

        // Se suscribe a los topicos y se pone a la escucha
        $suscriptorMqtt->suscribirse($topics);
    }
}
