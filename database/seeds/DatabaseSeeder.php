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
        // $this->call(UsersTableSeeder::class);

        Dispositivo::create([
            'ip' => '',
            'mac' => '',
            'nombre' => "Cloud",
        ]);

        Dispositivo::create([
            'ip' => '',
            'mac' => '',
            'nombre' => "Gestor 1",
        ]);

        Dispositivo::create([
            'ip' => '',
            'mac' => '',
            'nombre' => "Gestor 2",
        ]);
    }
}
