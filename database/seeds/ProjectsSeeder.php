<?php

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'id' => 1,
            'name' => 'Project 1',
        ]);
        Project::create([
            'id' => 2,
            'name' => 'Project 2',
        ]);
    }
}
