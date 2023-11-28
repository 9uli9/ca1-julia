<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DriverController extends Controller
{
    // Shows all drivers
    public function index()
    {
        // Retrieve all drivers from the database
        $drivers = Driver::all();

        // Render the 'drivers.index' view and pass the drivers data
        return view('drivers.index', [
            'drivers' => $drivers 
        ]);
    }

    // Show the create driver form
    public function create()
    {
        return view('drivers.create');
    }

    // Store a new driver
    public function store(Request $request): RedirectResponse
    {
        // Define validation rules and custom error messages
        $rules = [
            'first_name' => 'required|string|min:2|max:150',
            'last_name' => 'required|string|min:2|max:150',
            'age' => 'required|integer',
            'league_type' => 'required|in:f1,f2,f3',
        ];

        $messages = [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'age.required' => 'Age is required',
            'league_type.required' => 'League Type is required',
            'league_type.in' => 'Invalid League Type',
        ];

        // Validate the request data
        $request->validate($rules, $messages);

        // Create a new Driver instance and fill it with request data
        $driver = new Driver;
        $driver->first_name = $request->first_name;
        $driver->last_name = $request->last_name;
        $driver->age = $request->age;
        $driver->league_type = $request->league_type;
        $driver->save();

        // Redirect back to the 'drivers.index' route with a success message
        return redirect()->route('drivers.index')->with('status', 'Created a new Driver');
    }

    // Show details of a specific driver
    public function show(string $id)
    {
        // Find the driver by its ID
        $driver = Driver::findOrFail($id);

        // Render the 'drivers.show' view and pass the driver data
        return view('drivers.show', [
            'driver' => $driver
        ]);
    }

    // Edit a specific driver
    public function edit(string $id)
    {
        // Find the driver by its ID
        $driver = Driver::findOrFail($id);

        // Retrieve all cars from the database
        $cars = Car::all();
        
        // Render the 'drivers.edit' view and pass the driver and cars data
        return view('drivers.edit', [
            'driver' => $driver,
            'cars'=> $cars
        ]);
    }

    // Update an existing driver
    public function update(Request $request, string $id)
    {
        // Define validation rules and custom error messages
        $rules = [
            'first_name' => 'required|string|min:2|max:150',
            'last_name' => 'required|string|min:2|max:150',
            'age' => 'required|integer',
            'league_type' => 'required|in:f1,f2,f3',
            'car_id' => 'array',
        ];
    
        $messages = [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'age.required' => 'Age is required',
            'league_type.required' => 'League Type is required',
            'league_type.in' => 'Invalid League Type',
            'car_id.array' => 'Please select at least one car',
        ];
    
        // Validate the request data
        $request->validate($rules, $messages);
    
        // Find the driver by its ID
        $driver = Driver::findOrFail($id);
        $driver->first_name = $request->first_name;
        $driver->last_name = $request->last_name;
        $driver->age = $request->age;
        $driver->league_type = $request->league_type;
        $driver->save();


    
        // Redirect back to the 'drivers.index' route with a success message
        return redirect()->route('drivers.index')->with('status', 'Updated Driver');
    }
  
    // Delete a specific driver
    public function destroy(string $id)
    {
        // Find the driver by its ID
        $driver = Driver::findOrFail($id);
    
        // Delete the driver
        $driver->delete();

        // Redirect back to the 'drivers.index' route with a success message
        return redirect()->route('drivers.index')->with('status', 'Driver deleted successfully!');
    }
}
