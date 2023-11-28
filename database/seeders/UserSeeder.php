<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role_admin = Role::where('name', 'admin')->first();

        $role_user = Role::where('name', 'user')->first();




        $admin = new User;
        $admin->name = "Julia Szew";
        $admin->email = "admin@ca1example2.com";
        $admin->password = "secret123";
        $admin->save();

        //attach admin role to the user created above
        $admin->roles()->attach($role_admin);


        $admin = new User;
        $admin->name = "Mo Che";
        $admin->email = "admin@ca1example1.com";
        $admin->password = "secret123";
        $admin->save();

        //attach admin role to the user created above
        $admin->roles()->attach($role_user);

    }
}
