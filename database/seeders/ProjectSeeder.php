<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $types = Type::all();
        $ids = $types->pluck('id');

        $technologies = Technology::all();
        $techIds = $technologies->pluck('id');

        for ($i = 0; $i < 8; $i++) {
            $new_project = new Project();
            $new_project->description = $faker->paragraph(4);
            $new_project->title = $faker->words(4, true);
            $new_project->type_id = $faker->randomElement($ids);
            $new_project->save();

            $new_project->technologies()->attach(
                $faker->randomElements($techIds, null)
            );
        }
    }
}
