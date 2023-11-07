<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        $users = User::factory()->count(10)->create();
        

        $admin = new User;
        $admin->name = "Julia";
        $admin->email = "admin@ca1example.com";
        $admin->password = bcrypt("secret123"); // hashes the password
        $admin->save();
    }
}
