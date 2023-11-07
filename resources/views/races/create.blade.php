@extends('layouts.myApp')

@section('content')

<h3>Create Race</h3>

<form action="{{ route('races.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="Enter Title" style="color: black;"/>
        @error('title')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="location">Location</label>
        <input type="text" name="location" id="location" placeholder="Enter Location" style="color: black;"/>
        @error('location')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="difficulty">Difficulty</label>
        <input type="text" name="difficulty" id="difficulty" placeholder="Enter Difficulty" style="color: black;"/>
        @error('difficulty')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="max_capacity">Maximum Capacity</label>
        <input type="text" name="max_capacity" id="max_capacity" placeholder="Enter Maximum Capacity" style="color: black;"/>
        @error('max_capacity')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" id="start_date" style="color: black;"/>
        @error('start_date')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <button class="inline-block bg-red-600 dark:bg-red-700 text-white px-4 py-2 font-bold hover:bg-red-800 dark:hover:bg-red-900" type="submit">Submit</button>
</form>

@endsection
