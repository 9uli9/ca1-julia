<?php

namespace Database\Factories;

use App\Models\Driver;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'brand' => $this->faker->company,
            'colour' => $this->faker->colorName,
            'driver_id' => Driver::factory()->create()->id, 
        ];
    }
}
