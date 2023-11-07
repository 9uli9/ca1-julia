<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;


class CarFactory extends Factory
{

    public function definition(): array
    {
        return [
            'brand' => $this->faker->company, // Use carBrand provider for brand
            'colour' => $this->faker->colorName,
            'driver_id' => Driver::factory()->create()->id, 
        ];
    }
}
