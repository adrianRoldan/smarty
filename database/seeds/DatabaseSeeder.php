<?php

use App\Dispositivo;
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
            'ip' => '',
            'mac' => '',
            'puerto' => 10000,
            'nombre' => "Gestor 1",
        ]);

        Dispositivo::create([
            'ip' => '',
            'mac' => '',
            'puerto' => 10000,
            'nombre' => "Gestor 2",
        ]);
    }
}
