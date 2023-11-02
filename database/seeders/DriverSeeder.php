<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Driver::factory()->count(10)->create();
        
        $admin = new Driver;
        $admin->first_name = "Julia";
        $admin->last_name = "Szew";
        $admin->age = "21";
        $admin->league_type = "f1";

        $admin->save ();

        $admin = new Driver;
        $admin->first_name = "Luke";
        $admin->last_name = "DeeBrown";
        $admin->age = "20";
        $admin->league_type = "f2";

        $admin->save ();

        $admin = new Driver;
        $admin->first_name = "Angelina";
        $admin->last_name = "Morris";
        $admin->age = "19";
        $admin->league_type = "f3";

        $admin->save ();

        $admin = new Driver;
        $admin->first_name = "Ben";
        $admin->last_name = "Kershaw";
        $admin->age = "20";
        $admin->league_type = "f1";

        $admin->save ();
    }
}
