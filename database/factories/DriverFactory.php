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
            'age' => $this->faker->numberBetween(18, 40), // Generate a random number between 18 and 40
            'league_type' => Arr::random([
                'f1', 'f2', 'f3','rally', 'drag', 'street',
                'stock_car', 'go_karting',  'hill_climb', 'time_attack', 'autocross', 'drift', 'sprint',
                'hovercraft_racing', 'rocket_league', 'podracing', 'mario_kart', 'wacky_racers', 'cyberpunk_speedway', 'fantasy_grand_prix'
            ]),
            
        ];
    }
}
