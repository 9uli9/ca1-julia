<?php


use App\Models\CarRace;
use App\Models\Car;
use App\Models\Race;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarRaceFactory extends Factory
{
    protected $model = CarRace::class;

    public function definition(): array
    {
        $startTime = $this->faker->dateTimeBetween('now', '+1 week');
        $finishTime = $this->faker->dateTimeInInterval($startTime, '+6 hours');

        return [
            'start_time' => $startTime,
            'finish_time' => $finishTime,
            'position' => $this->faker->numberBetween(1, 10),
            'car_id' => Car::factory(),
            'race_id' => Race::factory(),
        ];
    }
}
