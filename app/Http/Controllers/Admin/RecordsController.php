<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Race;
use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Auth;

class RecordsController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        $drivers = Driver::all();
        $races = Race::all();
    
        return view('admin.records.index', compact('cars', 'drivers', 'races'));
    }

    
}
