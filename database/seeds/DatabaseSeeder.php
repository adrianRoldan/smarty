<?php

use App\Dispositivo;
use App\Nodo;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@smarty.com',
            'password' => bcrypt('123456')
        ]);

        Dispositivo::create([
            'ip' => '',
            'mac' => '',
            'puerto' => 10000,
            'nombre' => "Cloud",
        ]);

        Dispositivo::create([
            'ip' => '192.168.1.50',
            'mac' => '',
            'puerto' => config('app.mqtt_port'),
            'nombre' => "Gestor 1",
        ]);

        Nodo::create([
            'nombre' => "Semaforo 1",
            'ip' => '192.168.1.50',
            'client_mqtt_id' => "semaforo_1",
        ]);

        Nodo::create([
            'nombre' => "Semaforo 2",
            'ip' => '192.168.1.51',
            'client_mqtt_id' => "semaforo_2",
        ]);
        
        Nodo::create([
            'nombre' => "Semaforo 2",
            'ip' => '192.168.1.52',
            'client_mqtt_id' => "semaforo_3",
        ]);

        Nodo::create([
            'nombre' => "Ambulancia",
            'ip' => '192.168.1.53',
            'client_mqtt_id' => "ambulancia",
            'tipo' => "ambulancia",
        ]);

        Nodo::create([
            'nombre' => "Dispositivo Móvil",
            'ip' => '192.168.1.54',
            'client_mqtt_id' => "movil",
            'tipo' => "movil",
        ]);
    }
}
