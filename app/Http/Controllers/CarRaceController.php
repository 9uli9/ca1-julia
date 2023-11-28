<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarRace;

class CarRaceController extends Controller
{
    public function index()
    {
        $carRaces = CarRace::all();
        return view('carraces.index', compact('carRaces'));
    }

    public function show($id)
    {
        $carRace = CarRace::findOrFail($id);
        return view('carraces.show', compact('carRace'));
    }

    public function create()
    {

        return view('carraces.create');
    }

    public function store(Request $request)
    {
 
        $request->validate([
            // validation rules here
        ]);


        CarRace::create($request->all());


        return redirect()->route('carraces.index');
    }


}
