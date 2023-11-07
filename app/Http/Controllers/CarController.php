<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CarController extends Controller
{

    // Shows all cars 
    public function index()
    {
        // Retrieve all cars from the database
        $cars = Car::all();

        // Render the 'cars.index' view and pass the cars data
        return view('cars.index', [
            'cars' => $cars 
        ]);
    }


    public function create()
    {
        // Retrieve all drivers from the database
        $drivers = Driver::all(); 

        // Render the 'cars.create' view and pass the drivers data
        return view('cars.create', [
            'drivers' => $drivers, 
        ]);
    }

    // Store a new car
    public function store(Request $request): RedirectResponse
    {
        // Define validation rules and custom error messages
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

        // Validate the request data
        $request->validate($rules, $messages);

        // Create a new Car instance and fill it with request data
        $car = new Car;
        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->colour = $request->colour;
        $car->driver_id = $request->driver_id; 

        // Save the car to the database
        $car->save();

        // Redirect back to the 'cars.index' route with a success message
        return redirect()->route('cars.index')->with('status', 'Created a new Car');
    }

    // Show details of a specific car
    public function show(string $id)
    {
        // Find the car by its ID
        $car = Car::findOrFail($id);

        // Render the 'cars.show' view and pass the car data
        return view('cars.show', [
            'car' => $car
        ]);
    }

    // Edit a specific car
    public function edit(string $id)
    {
        // Find the car by its ID
        $car = Car::findOrFail($id);

        // Retrieve all drivers from the database
        $drivers = Driver::all(); 

        // Render the 'cars.edit' view and pass the car and drivers data
        return view('cars.edit', [
            'car' => $car,
            'drivers' => $drivers, 
        ]);
    }

    // Update an existing car
    public function update(Request $request, string $id)
    {
        // Define validation rules and custom error messages
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
    
        // Validate the request data
        $request->validate($rules, $messages);
    
        // Find the car by its ID
        $car = Car::findOrFail($id);

        // Update car attributes with request data
        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->colour = $request->colour;
        $car->driver_id = $request->driver_id;

        // Save the updated car to the database
        $car->save();
    
        // Set old input manually
        $request->flash();
    
        // Redirect back to the 'cars.index' route with a success message
        return redirect()->route('cars.index')->with('status', 'Updated Car');
    }
    

    // Delete a specific car
    public function destroy(string $id)
    {
        // Find the car by its ID
        $car = Car::findOrFail($id);

        // Delete the car
        $car->delete();

        // Redirect back to the 'cars.index' route with a success message
        return redirect()->route('cars.index')->with('status', 'Selected Car deleted successfully!');

    }
}
