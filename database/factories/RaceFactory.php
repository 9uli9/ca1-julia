<?php

namespace Database\Factories;

use App\Models\Race;
use Illuminate\Database\Eloquent\Factories\Factory;

class RaceFactory extends Factory
{
    // This factory is used to generate fake data for the Race model.

    public function definition(): array
    {
        // The definition method defines the structure of the fake data.

        return [
            'title' => $this->faker->title, // Generate a random title (Doesn't work well with my app I should have put it in manually)
            'location' => $this->faker->address, // Generate a random address but i should have just used cities
            'difficulty' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Expert']), // Choose a random difficulty level which is an enum
            'max_capacity' => $this->faker->numberBetween(2, 100), // Generate a random number between 2 and 100
            'start_date' => $this->faker->date(), // Generate a random date
        ];
    }
}
