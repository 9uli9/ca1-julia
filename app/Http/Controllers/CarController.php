<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('cars.index', [
            'cars' => $cars 
        ]);
    }

    public function create()
    {
        $drivers = Driver::all(); // Retrieve all drivers from the database

        return view('cars.create', [
            'drivers' => $drivers, // Pass the drivers to the view
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => 'required|string|min:2|max:150',
            'brand' => 'required|string|min:2|max:150',
            'colour' => 'required|string|min:2|max:150',
            'driver_id' => 'required|integer|exists:drivers,id', // Added 'integer' rule
        ];
    
        $messages = [
            'name.required' => 'Name is required',
            'brand.required' => 'Brand is required',
            'colour.required' => 'Colour is required',
            'driver_id.integer' => 'Driver ID must be an integer', // Added custom message for integer rule
        ];

        $request->validate($rules, $messages);

        $car = new Car;
        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->colour = $request->colour;
        $car->driver_id = $request->driver_id; 

        $car->save();

        return redirect()->route('cars.index')->with('status', 'Created a new Car');
    }

    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('cars.show', [
            'car' => $car
        ]);
    }

    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        $drivers = Driver::all(); // Retrieve all drivers from the database

        return view('cars.edit', [
            'car' => $car,
            'drivers' => $drivers, // Pass the drivers to the view
        ]);
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|string|min:2|max:150',
            'brand' => 'required|string|min:2|max:150',
            'colour' => 'required|string|min:2|max:150',
            'driver_id' => 'required|integer|exists:drivers,id',

        ];
    
        $messages = [
            'name.required' => 'Name is required',
            'brand.required' => 'Brand is required',
            'colour.required' => 'Colour is required',
            'driver_id.integer' => 'Driver ID must be an integer',
        ];
    
        $request->validate($rules, $messages);
    
        $car = Car::findOrFail($id);
        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->colour = $request->colour;
        $car->driver_id = $request->driver_id;

        $car->save();
    
        // Set old input manually
        $request->flash();
    
        return redirect()->route('cars.index')->with('status', 'Updated Car');
    }
    

    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('cars.index')->with('status', 'Selected Car deleted successfully!');

    }
}
