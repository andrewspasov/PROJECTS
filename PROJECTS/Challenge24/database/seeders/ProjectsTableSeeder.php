<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 9; $i++) {
            DB::table('projects')->insert([
                'name' => $faker->words(3, true),
                'subtitle' => $faker->sentence,
                'description' => $faker->text(200),
                'image_url' => $faker->imageUrl(),
                'project_url' => $faker->url,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
