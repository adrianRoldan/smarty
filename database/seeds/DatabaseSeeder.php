<?php

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

        $this->call(ProjectsSeeder::class);
        /*User::create([
            'name' => 'admin',
            'email' => "adrian.roldan.90@gmail.com",
            'password' => bcrypt("secreto")
        ]);*/
    }
}
