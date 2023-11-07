<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // Establishes a One-To-Many Relationship car has one driver

    public function drivers()
    {
        return $this->belongsToMany(Driver::class);
    }
}
