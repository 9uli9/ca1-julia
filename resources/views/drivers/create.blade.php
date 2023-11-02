@extends('layouts.myApp')

@section('content')

<h3>Create Driver</h3>

<form action="{{ route('drivers.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" placeholder="Enter First name"style="color: black;"/>
        @error('first_name')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" placeholder="Enter Last name"style="color: black;"/>
        @error('last_name')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="age">Age</label>
        <input type="number" name="age" id="age" placeholder="Enter Age"style="color: black;"/>
        @error('age')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="league_type">League Type</label>
        <input type="text" name="league_type" id="league_type" placeholder="Enter League" style="color: black;"/>
        @error('league_type')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <button class="inline-block bg-red-600 dark:bg-red-700 text-white px-4 py-2 font-bold hover:bg-red-800 dark:hover:bg-red-900" type="submit ">Submit</button>
</form>

@endsection
