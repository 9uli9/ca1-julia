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

    // public function __construct(){
    //         Auth::user()->authorizeRoles('admin');
    //      }


    // Shows all drivers
    public function index()
    {
            //     Auth::user()->authorizeRoles('admin');

        // if(!Auth::user()->hasRole('admin')){
        //     return to_route('user.drivers.index');
        // }


        // // Retrieve all drivers from the database
        // $drivers = Driver::all();

        // // Render the 'drivers.index' view and pass the drivers data
        // return view('admin.drivers.index', [
        //     'drivers' => $drivers 
        // ]);
        $drivers = Driver::paginate(10);
        return view('admin.drivers.index')->with('drivers', $drivers);
    }

    // Show the create driver form
    public function create()
    {
        return view('admin.drivers.create');
        
    }

    // Store a new driver
    public function store(Request $request): RedirectResponse
    {
        // Define validation rules and custom error messages
        $rules = [
            'first_name' => 'required|string|min:2|max:150',
            'last_name' => 'required|string|min:2|max:150',
            'age' => 'required|integer',
            'league_type' => 'required|in: f1, f2, f3, rally, drag, street,
            stock_car, go_karting,  hill_climb, time_attack, autocross, drift, sprint,
            hovercraft_racing, rocket_league, podracing, mario_kart, wacky_racers, cyberpunk_speedway, fantasy_grand_prix',
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
        return redirect()->route('admin.drivers.index')->with('status', 'Created a new Driver');
    }

    // Show details of a specific driver
    public function show(string $id)
    {
        // Find the driver by its ID
        $driver = Driver::findOrFail($id);

        // Render the 'drivers.show' view and pass the driver data
        return view('admin.drivers.show', [
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
        return view('admin.drivers.edit', [
            'driver' => $driver,
            'cars'=> $cars,
            'leagueTypes' => ['f1', 'f2', 'f3','rally', 'drag', 'street',
            'stock_car', 'go_karting',  'hill_climb', 'time_attack', 'autocross', 'drift', 'sprint',
            'hovercraft_racing', 'rocket_league', 'podracing', 'mario_kart', 'wacky_racers', 'cyberpunk_speedway', 'fantasy_grand_prix'
]
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
            'league_type' => 'required|in: f1, f2, f3, rally, drag, street,
            stock_car, go_karting,  hill_climb, time_attack, autocross, drift, sprint,
            hovercraft_racing, rocket_league, podracing, mario_kart, wacky_racers, cyberpunk_speedway, fantasy_grand_prix',
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
        return redirect()->route('admin.drivers.index')->with('status', 'Updated Driver');
    }
  
    // Delete a specific driver
    public function destroy(string $id)
    {
        // Find the driver by its ID
        $driver = Driver::findOrFail($id);
    
        // Delete the driver
        $driver->delete();

        // Redirect back to the 'drivers.index' route with a success message
        return redirect()->route('admin.drivers.index')->with('status', 'Driver deleted successfully!');
    }
}
