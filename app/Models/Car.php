<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model', 
        'manufacturer', 
        'type',
        'fuel',
        'colour', 
        'vin', 
        'vrm',
        'driver_id',
        'car_image'
    ];

    // Define the many-to-many relationship with races
    public function races()
    {

        return $this->belongsToMany(Race::class, 'records')
            ->withPivot('start_time', 'finish_time', 'position')
            ->withTimestamps();

    }

    // Define the one-to-many relationship with drivers
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    
}
