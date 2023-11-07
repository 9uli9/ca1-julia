<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{

    public function definition(): array
    {
        // This method defines the structure of the fake data for the Car model.

        return [
            'brand' => $this->faker->company, // Generate a random company name (brand)
            'colour' => $this->faker->colorName, // Generate a random color name
            'driver_id' => Driver::factory()->create()->id, // Create a new driver using the DriverFactory and get its ID
        ];
    }
}
