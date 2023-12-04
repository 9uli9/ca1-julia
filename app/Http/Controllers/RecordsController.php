<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    public function showBestFinishTime()
    {

        $cars = Car::with(['races' => function ($query) {
            $query->orderBy('finish_time', 'asc');
        }, 'driver'])->get();

        return view('records.index', compact('cars'));
    }
}
