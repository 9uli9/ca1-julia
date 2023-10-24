<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        // $drivers = Driver::orderBy('created_at', 'desc');
        $drivers = Driver::all();

        return view('drivers.index', [
            'drivers' => $drivers 
        ]);
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request): RedirectResponse
    {


        $rules = [
            'first_name' => 'required|string|min:2|max:150',
            'last_name' => 'required|string|min:2|max:150',
            'age' => 'required|integer',
            'league_type' => 'required|enum',
        ];



        $request->validate($rules, $messages);

        $driver = new Driver;
        $driver->first_name = $request->first_name;
        $driver->last_name = $request->last_name;
        $driver->age = $request->age;
        $driver->league_type = $request->league_type;
        $driver->save();

        return redirect()->route('drivers.index')->with('status', 'Created a new Driver');
    }

    public function show(string $id)
    {
        $driver = Driver::findOrFail($id);
        return view('driver.show', [
        'driver' => $driver
        ]);
    }

    public function edit(string $id)
    {
        $driver = Driver::findOrFail($id);
        return view('driver.edit', [
            'driver' => $driver
        ]);
    }


    public function update(Request $request, string $id)
    {
        $rules = [
            'first_name' => 'required|string|min:2|max:150',
            'last_name' => 'required|string|min:2|max:150',
            'age' => 'required|string',
            'league_type' => 'required|enum',
        ];


        $request->validate($rules, $messages);

        $driver = Driver::findOrFail($id);
        $driver->first_name = $request->first_name;
        $driver->last_name = $request->last_name;
        $driver->age = $request->age;
        $driver->league_type = $request->league_type;

        $driver->save();

        return redirect()->route('driver.index')->with('status', 'Updated Driver');
    }


    public function destroy(string $id)
    {
        $driver = Driver::findOrFail($id);
        $driver ->delete();

        return redirect()->route('driver.index')->with('status', 'Selected Driver deleted successfully!');
    }
}
