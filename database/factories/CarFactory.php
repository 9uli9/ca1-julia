<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{

    public function definition(): array
    {
        //  fake data for the Car model.

        return [
            'colour' => $this->faker->randomElement(['Red', 'Blue', 'Green', 'Black', 'White', 'Silver', 'Gray', 'Yellow', 'Orange', 'Purple', 'Brown', 'Cyan', 'Magenta', 'Beige', 'Turquoise', 'Indigo', 'Teal', 'Olive', 'Pink', 'Lavender']), 
            'fuel' => $this->faker->randomElement(['Gasoline', 'Diesel', 'Electric', 'Water', 'Solar']),
            'manufacturer' => $this->faker->randomElement(['Toyota', 'Ford', 'Honda', 'Chevrolet', 'BMW', 'Mercedes-Benz', 'Audi', 'Volkswagen', 'Tesla', 'Nissan', 'Subaru', 'Hyundai', 'Kia', 'Mazda', 'Lexus', 'Jeep', 'Chrysler', 'Volvo', 'Jaguar', 'Land Rover']),
            'model' => $this->faker->randomElement(['Turbo Thrust', 'Velocity Vibe', 'Electro Buzz', 'Galactic Glide', 'Mystic Marvel', 'Adventure Ace', 'Sunbeam Sprint', 'Dreamy Dazzle', 'Lunar Lively', 'Whizbang Wonder', 'Stellar Spark', 'Cosmic Cruiser', 'Velocity Vapor', 'Joyride Jolt', 'Epic Elation', 'Fiesta Frenzy', 'Gleam Gleeful', 'Blast Burst', 'Zephyr Zing', 'Vivid Velocity']),
            'type' => $this->faker->randomElement(['Sedan', 'SUV', 'Truck', 'Sports Car', 'Convertible', 'Coupe', 'Wagon', 'Hatchback', 'Minivan', 'Van', 'Crossover', 'Compact Car', 'Electric Car', 'Hybrid', 'Luxury Car', 'Off-road Vehicle', 'Pickup Truck', 'Commercial Vehicle', 'Race Car', 'Vintage Car', 'Exotic Car']),
            'vin' => $this->faker->unique()->isbn10,
            'vrm' => $this->faker->regexify('[A-Z]{2}[0-9]{2} [A-Z]{3}'), 
            'description' => 'A perfect blend of style and performance. The powerful engine delivers an exhilarating ride',
            'driver_id' => Driver::factory()->create()->id, 
        ];
    }
}
