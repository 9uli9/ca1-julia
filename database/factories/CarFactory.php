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
            'brand' => $this->faker->randomElement(['Toyota', 'Ford', 'Honda', 'Chevrolet', 'BMW', 'Mercedes-Benz', 'Audi', 'Volkswagen', 'Tesla', 'Nissan', 'Subaru', 'Hyundai', 'Kia', 'Mazda', 'Lexus', 'Jeep', 'Chrysler', 'Volvo', 'Jaguar', 'Land Rover']),
            'colour' => $this->faker->randomElement(['Red', 'Blue', 'Green', 'Black', 'White', 'Silver', 'Gray', 'Yellow', 'Orange', 'Purple', 'Brown', 'Cyan', 'Magenta', 'Beige', 'Turquoise', 'Indigo', 'Teal', 'Olive', 'Pink', 'Lavender']),            
            'driver_id' => Driver::factory()->create()->id, // Create a new driver using the DriverFactory and get its ID
        ];
    }
}
