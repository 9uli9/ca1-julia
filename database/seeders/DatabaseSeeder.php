<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            DriverSeeder::class,
            CarSeeder::class,
            RaceSeeder::class,
            CarRaceSeeder::class
        ]);

    }
}
