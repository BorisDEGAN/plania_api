<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects_file_path = database_path("seeders/json/projects.json");

        if(file_exists($projects_file_path)) {
            $projects = json_decode(file_get_contents($projects_file_path), true)['projects'];
            foreach ($projects as $project) {
                $project = Project::create($project);
            }
        }
    }
}
