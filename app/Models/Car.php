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

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    
}
