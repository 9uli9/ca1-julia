@extends('layouts.myApp')

@section('content')

<h3>Edit Driver</h3>

<form action="{{ route('drivers.update', $driver->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $driver->first_name) }}" placeholder="Enter first name"/>
        @error('first_name')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $driver->last_name) }}" placeholder="Enter last name"/>
        @error('last_name')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" value="{{ old('age', $driver->age) }}" placeholder="Enter age"/>
        @error('age')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="league_type">League Type</label>
        <input type="text" name="league_type" id="league_type" value="{{ old('league_type', $driver->league_type) }}" placeholder="Enter league type"/>
        @error('league_type')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Submit</button>
</form>

@endsection
