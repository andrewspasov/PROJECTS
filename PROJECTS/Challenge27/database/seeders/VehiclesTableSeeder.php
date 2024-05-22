<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use Faker\Factory as Faker;

class VehiclesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));

        for ($i = 0; $i < 50; $i++) {
            Vehicle::create([
                'brand' => $faker->vehicleBrand,
                'model' => $faker->vehicleModel,
                'plate_number' => $faker->vehicleRegistration('[A-Z]{2}-[0-9]{4}'),
                'insurance_date' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            ]);
        }
    }
}
