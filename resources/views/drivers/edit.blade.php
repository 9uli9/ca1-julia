@extends('layouts.myApp')

@section('content')

<h3>Edit Driver</h3>

<form action="{{ route('drivers.update', $driver->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $driver->first_name) }}" placeholder="Enter first name" style="color: black;"/>
        @error('first_name')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $driver->last_name) }}" placeholder="Enter last name" style="color: black;"/>
        @error('last_name')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="age">Age</label>
        <input type="number" name="age" id="age" value="{{ old('age', $driver->age) }}" placeholder="Enter age" style="color: black;"/>
        @error('age')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="league_type">League Type</label>
        <input type="text" name="league_type" id="league_type" value="{{ old('league_type', $driver->league_type) }}" placeholder="Enter league type" style="color: black;"/>
        @error('league_type')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="inline-block bg-red-600 dark:bg-red-700 text-white px-4 py-2 font-bold hover:bg-red-800 dark:hover:bg-red-900 mb-4" >Submit</button>
</form>

<form action="{{ route('drivers.destroy', $driver->id) }}" method="POST">
    @csrf
    @method('DELETE')
    
    <!-- Your input fields here -->
    
    <button type="submit" class="bg-red-600 text-white px-4 py-2 font-bold hover:bg-red-800">Delete</button>
</form>

@endsection
