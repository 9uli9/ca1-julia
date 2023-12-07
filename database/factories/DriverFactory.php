<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;


class DriverFactory extends Factory
{

    public function definition(): array
    {
        // This method defines the structure of the fake data for the Driver model.

        return [
            'first_name' => $this->faker->firstName, // Generate a random first name
            'last_name' => $this->faker->lastName, // Generate a random last name
            'age' => $this->faker->numberBetween(18, 40)
            
        ];
    }
}
