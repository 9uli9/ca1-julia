<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    // Establishes a One-To-Many Relationship Driver has many cars

    public function cars()
    {
        return $this->hasMany(Car::class); 
    }
}
