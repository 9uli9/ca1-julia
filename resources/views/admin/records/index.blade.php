<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.admin')

@section('header')
    <h2 class="font-semibold text-xl text-white leading-tight">
        Dashboard
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Display Cars -->
            <div class="mb-6">
                <h3 class="text-2xl font-bold text-white">Cars</h3>
                <ul>
                    @foreach ($cars as $car)
                        <li>{{ $car->model }} ({{ $car->vrm }})</li>
                    @endforeach
                </ul>
            </div>

            <!-- Display Drivers -->
            <div class="mb-6">
                <h3 class="text-2xl font-bold text-white">Drivers</h3>
                <ul>
                    @foreach ($drivers as $driver)
                        <li>{{ $driver->first_name }} {{ $driver->last_name }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Display Races -->
            <div>
                <h3 class="text-2xl font-bold text-white">Races</h3>
                <ul>
                    @foreach ($races as $race)
                        <li>{{ $race->title }} ({{ $race->location }})</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
