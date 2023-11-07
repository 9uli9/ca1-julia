<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Race;
use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RaceController extends Controller
{
    public function index()
    {
        $races = Race::all();

        return view('races.index', [
            'races' => $races
        ]);
    }

    public function create()
    {
        $races = Race::all(); 
    
        return view('races.create', [
            'races' => $races, 
        ]);
    }
    

    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'title' => 'required|string|min:2|max:150',
            'location' => 'required|string|min:2|max:150',
            'difficulty' => 'required|in:Beginner,Intermediate,Expert',
            'max_capacity' => 'required|integer', 
            'start_date' => 'required|date', 

        ];
    
        $messages = [
            'title.required' => 'Title is required',
            'location.required' => 'Location is required',
            'difficulty.required' => 'Difficulty is required',
            'difficulty.in' => 'Invalid Difficulty',
            'max_capacity.required' => 'Maximum Capacity is required',
            'start_date.required' => 'Start Date is required',

        ];

        $request->validate($rules, $messages);

        $race = new race;
        $race->title = $request->title;
        $race->location = $request->location;
        $race->difficulty = $request->difficulty;
        $race->max_capacity = $request->max_capacity; 
        $race->start_date = $request->start_date;

        $race->save();

        return redirect()->route('races.index')->with('status', 'Created a new Race');
    }

    public function show(string $id)
    {
        $race = Race::findOrFail($id);
        return view('races.show', [
            'race' => $race
        ]);
    }

    public function edit(string $id)
    {
        $race = Race::findOrFail($id);
        return view('races.edit', [
            'race' => $race
        ]);
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'title' => 'required|string|min:2|max:150',
            'location' => 'required|string|min:2|max:150',
            'difficulty' => 'required|in:Beginner,Intermediate,Expert',
            'max_capacity' => 'required|integer', 
            'start_date' => 'required|integer', 

        ];
    
        $messages = [
            'title.required' => 'Title is required',
            'location.required' => 'Location is required',
            'difficulty.required' => 'Difficulty is required',
            'difficulty.in' => 'Invalid Difficulty',
            'max_capacity.required' => 'Maximum Capacity is required',
            'start_date.required' => 'Start Date is required',

        ];
    
        $request->validate($rules, $messages);
    
        $race = Race::findOrFail($id);
        $race->title = $request->title;
        $race->location = $request->location;
        $race->difficulty = $request->difficulty;
        $race->max_capacity = $request->max_capacity; 
        $race->start_date = $request->start_date;

        $race->save();
    
        // Set old input manually
        $request->flash();
    
        return redirect()->route('races.index')->with('status', 'Updated Race');
    }
    

    public function destroy(string $id)
    {
        $race = Race::findOrFail($id);
        $race->delete();

        return redirect()->route('races.index')->with('status', 'Selected race deleted successfully!');

    }
}
