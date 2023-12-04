<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Race;

class RecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Race::factory()
            ->count(5) // Number of races
            ->create()
            ->each(function ($race) {
                // Attach cars to each race
                Car::factory()
                    ->count(20) // Number of cars per race
                    ->create()
                    ->each(function ($car) use ($race) {
                        $race->cars()->attach($car->id);
                    });
            });
    }
}
