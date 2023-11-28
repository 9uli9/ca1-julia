<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // Define the many-to-many relationship with races
    public function races()
    {
        return $this->belongsToMany(Race::class, 'car_race')
            ->withPivot('start_time', 'finish_time', 'position');

    }

    // Define the one-to-many relationship with drivers
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
