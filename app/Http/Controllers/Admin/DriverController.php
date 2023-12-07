<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Race;
use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Auth;

class DriverController extends Controller
{

    // Shows all drivers
    public function index()
    {
        $drivers = Driver::paginate(10);
        return view('admin.drivers.index', ['drivers' => $drivers ]);

    }

    // Show the create driver form
    public function create()
    {
        $cars = Car::all();
        
        return view('admin.drivers.create', ['cars' => $cars]);
        
    }

    // Store a new driver
    public function store(Request $request): RedirectResponse
    {
        // Define validation rules and custom error messages
        $rules = [
            'first_name' => 'required|string|min:2|max:150',
            'last_name' => 'required|string|min:2|max:150',
            'age' => 'required|integer',

            
        ];

        $messages = [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'age.required' => 'Age is required',

            
        ];

        // Validate the request data
        $request->validate($rules, $messages);

        // Create a new Driver instance and fill it with request data
        $driver = new Driver;
        $driver->first_name = $request->first_name;
        $driver->last_name = $request->last_name;
        $driver->age = $request->age;
        $driver->save();

        // Redirect back to the 'drivers.index' route with a success message
        return redirect()->route('admin.drivers.index')->with('status', 'Created a new Driver');
    }

    // Show details of a specific driver
    public function show(string $id)
    {
        // Find the driver by its ID with the related cars
        $driver = Driver::with('cars')->findOrFail($id);
    
        // Render the 'admin.drivers.show' view and pass the driver data
        return view('admin.drivers.show', [
            'driver' => $driver,
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
        return view('admin.drivers.edit', [
            'driver' => $driver,
            'cars'=> $cars
        ]);
    }


    public function update(Request $request, string $id)
    {

        $rules = [
            'first_name' => 'required|string|min:2|max:150',
            'last_name' => 'required|string|min:2|max:150',
            'age' => 'required|integer',
  
        ];
    
        $messages = [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'age.required' => 'Age is required',

        ];

        $request->validate($rules, $messages);
    
        $driver = Driver::findOrFail($id);
        $driver->first_name = $request->first_name;
        $driver->last_name = $request->last_name;
        $driver->age = $request->age;
        $driver->save();



        return redirect()->route('admin.drivers.index')->with('status', 'Updated Driver');
    }
  
    // Delete a specific driver
    public function destroy(string $id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return redirect()->route('admin.drivers.index')->with('status', 'Driver deleted successfully!');
    }
}
