<?php

namespace Database\Factories;

use App\Models\Race;
use Illuminate\Database\Eloquent\Factories\Factory;

class RaceFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'location' => $this->faker->address,
            'difficulty' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Expert']),
            'max_capacity' => $this->faker->numberBetween(2, 100),
            'start_date' => $this->faker->date(),
        ];
    }
}
