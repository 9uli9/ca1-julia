@extends('layouts.myApp')

@section('content')

<h3>Create Driver</h3>

<form action="{{ route('drivers.store') }}" method="POST">
    @csrf

    <div>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name"/>
        @error('first_name')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name"/>
        @error('last_name')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="age">Age</label>
        <input type="number" name="age" id="age"/>
        @error('age')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="league_type">League Type</label>
        <input type="text" name="league_type" id="league_type"/>
        @error('league_type')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Submit</button>
</form>

@endsection
