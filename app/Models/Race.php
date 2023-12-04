<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    // Define the many-to-many relationship with cars
    public function cars()
    {
        return $this->belongsToMany(Car::class, 'records')
            ->withPivot('start_time', 'finish_time', 'position')
            ->withTimestamps();
    }
}
