<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()->count(10)->create();

        User::factory()->count(10)->create();
        $admin = new User;
        $admin->name = "Julia";
        $admin->email = "admin@ca1example.com";
        $admin->password = "secret123";
        $admin->save ();

        $admin = new User;
        $admin->name = "Aneta";
        $admin->email = "admin2@ca1example.com";
        $admin->password = "secret123";
        $admin->save ();
    }
}
