<?php
namespace Database\Seeders;

use App\Models\Car;
use App\Models\Driver;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    public function run(): void
    {

        Car::factory()->count(10)->create();


        // $faker = \Faker\Factory::create();
        // $randomCar = Car::create([
        //     'name' => $faker->word,
        //     'brand' => $faker->company, 
        //     'colour' => $faker->colorName,
        //     'driver_id' => $faker->numberBetween(1, 10), // 10 drivers
        // ]);
    }
}
