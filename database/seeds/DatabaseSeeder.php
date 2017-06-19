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
            'ip' => '192.168.43.80',
            'mac' => '',
            'puerto' => 10000,
            'nombre' => "Cloud",
        ]);

        Dispositivo::create([
            'ip' => '192.168.61.43',
            'mac' => '',
            'puerto' => config('app.mqtt_port'),
            'nombre' => "Broker Master",
        ]);

        Dispositivo::create([
            'ip' => '192.168.1.56',
            'mac' => '',
            'puerto' => config('app.mqtt_port'),
            'nombre' => "Broker 1",
        ]);

        Dispositivo::create([
            'ip' => '192.168.60.234',
            'mac' => '',
            'puerto' => config('app.mqtt_port'),
            'nombre' => "Broker 2",
        ]);


        $this->call(NodoSeeder::class);
    }
}
