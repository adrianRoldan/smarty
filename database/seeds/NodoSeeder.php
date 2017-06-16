<?php

use App\Nodo;
use Illuminate\Database\Seeder;

class NodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nodo::create([
            'nombre' => "Semaforo 1",
            'ubicacion_x' => 4,
            'ubicacion_y' => 10,
            'client_mqtt_id' => "semaforo_1",
        ]);

        Nodo::create([
            'nombre' => "Semaforo 2",
            'ubicacion_x' => 5,
            'ubicacion_y' => 6,
            'client_mqtt_id' => "semaforo_2",
        ]);

        Nodo::create([
            'nombre' => "Semaforo 3",
            'ubicacion_x' => 5,
            'ubicacion_y' => 11,
            'client_mqtt_id' => "semaforo_3",
        ]);

        Nodo::create([
            'nombre' => "Semaforo 4",
            'ubicacion_x' => 5,
            'ubicacion_y' => 16,
            'client_mqtt_id' => "semaforo_4",
        ]);

        Nodo::create([
            'nombre' => "Semaforo 5",
            'ubicacion_x' => 6,
            'ubicacion_y' => 5,
            'client_mqtt_id' => "semaforo_5",
        ]);


        Nodo::create([
            'nombre' => "Semaforo 6",
            'ubicacion_x' => 6,
            'ubicacion_y' => 15,
            'client_mqtt_id' => "semaforo_6",
        ]);

        Nodo::create([
            'nombre' => "Semaforo 7",
            'ubicacion_x' => 9,
            'ubicacion_y' => 10,
            'client_mqtt_id' => "semaforo_7",
        ]);

        Nodo::create([
            'nombre' => "Semaforo 8",
            'ubicacion_x' => 10,
            'ubicacion_y' => 4,
            'client_mqtt_id' => "semaforo_8",
        ]);

        Nodo::create([
            'nombre' => "Semaforo 9",
            'ubicacion_x' => 10,
            'ubicacion_y' => 9,
            'client_mqtt_id' => "semaforo_9",
        ]);

        Nodo::create([
            'nombre' => "Semaforo 10",
            'ubicacion_x' => 10,
            'ubicacion_y' => 14,
            'client_mqtt_id' => "semaforo_10",
        ]);

        Nodo::create([
            'nombre' => "Semaforo 11",
            'ubicacion_x' => 11,
            'ubicacion_y' => 5,
            'client_mqtt_id' => "semaforo_11",
        ]);

        Nodo::create([
            'nombre' => "Semaforo 12",
            'ubicacion_x' => 11,
            'ubicacion_y' => 15,
            'client_mqtt_id' => "semaforo_12",
        ]);

        Nodo::create([
            'nombre' => "Ambulancia",
            'ip' => '192.168.1.53',
            'ubicacion_x' => 0,
            'ubicacion_y' => 0,
            'client_mqtt_id' => "ambulancia",
            'tipo' => "ambulancia",
        ]);

        Nodo::create([
            'nombre' => "Dispositivo Móvil",
            'ip' => '192.168.1.54',
            'ubicacion_x' => 0,
            'ubicacion_y' => 0,
            'client_mqtt_id' => "movil",
            'tipo' => "movil",
        ]);
    }
}
