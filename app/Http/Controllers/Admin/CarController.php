<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Auth;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::paginate(10);
        return view('admin.cars.index')->with('cars', $cars);
    }

    public function create()
    {
        $drivers = Driver::all();
        return view('admin.cars.create')->with('drivers', $drivers);
    }

    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'model' => 'required|string|min:2|max:150',
            'manufacturer' => 'required|string|min:2|max:150',
            'type' => 'required|string|min:2|max:150',
            'fuel' => 'required|string|min:2|max:150',
            'colour' => 'required|string|min:2|max:150',
            'vin' => 'required|string|min:2|max:150',
            'vrm' => 'required|string|min:2|max:150',
            'driver_id' => 'required|integer|exists:drivers,id',
            'car_image' => 'file|image',
        ];

        $messages = [
            'model.required' => 'Model is required',
            'manufacturer.required' => 'Manufacturer is required',
            'type.required' => 'Type is required',
            'fuel.required' => 'Fuel is required',
            'colour.required' => 'Colour is required',
            'vin.required' => 'VIN is required',
            'vrm.required' => 'VRM is required',
            'driver_id.integer' => 'Driver ID must be an integer',
            
        ];

        $car_image = $request->file('car_image');
        $extension = $car_image->getClientOriginalExtension();
        $filename = date('Y-m-d-His') . "_" . $request->input('title') . "." . $extension;

        $car_image->storeAs('public/images, $filename');

        $request->validate($rules, $messages);

               // Create a new Driver instance and fill it with request data
               $car = new Car;
               $car->model = $request->model;
               $car->manufacturer = $request->manufacturer;
               $car->type = $request->type;
               $car->fuel = $request->fuel;
               $car->colour = $request->colour;
               $car->vin = $request->vin;
               $car->vrm = $request->vrm;
               $car->driver_id = $request->driver_id;
               $car->car_image = $request->car_image;
               $car->save();
       
               // Redirect back to the 'cars.index' route with a success message
               return redirect()->route('admin.cars.index')->with('status', 'Created a new car');
           }


    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.show', [
            'car' => $car
        ]);
    }

    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        $drivers = Driver::all();
        return view('admin.cars.edit', [
            'car' => $car,
            'drivers' => $drivers,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'model' => 'required|string|min:2|max:150',
            'manufacturer' => 'required|string|min:2|max:150',
            'type' => 'required|string|min:2|max:150',
            'fuel' => 'required|string|min:2|max:150',
            'colour' => 'required|string|min:2|max:150',
            'vin' => 'required|string|min:2|max:150',
            'vrm' => 'required|string|min:2|max:150',
            'driver_id' => 'required|integer|exists:drivers,id',
        ];

        $messages = [
            'model.required' => 'Model is required',
            'manufacturer.required' => 'Manufacturer is required',
            'type.required' => 'Type is required',
            'fuel.required' => 'Fuel is required',
            'colour.required' => 'Colour is required',
            'vin.required' => 'VIN is required',
            'vrm.required' => 'VRM is required',
            'driver_id.integer' => 'Driver ID must be an integer',
        ];

        $request->validate($rules, $messages);

        $car = Car::findOrFail($id);
        $car->update([
            'model' => $request->model,
            'manufacturer' => $request->manufacturer,
            'type' => $request->type,
            'fuel' => $request->fuel,
            'colour' => $request->colour,
            'vin' => $request->vin,
            'vrm' => $request->vrm,
            'driver_id' => $request->driver_id,
        ]);

        return redirect()->route('admin.cars.index')->with('status', 'Updated Car');
    }

    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('admin.cars.index')->with('status', 'Selected Car deleted successfully!');
    }


}
