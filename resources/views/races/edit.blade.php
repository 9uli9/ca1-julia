@extends('layouts.myApp')

@section('content')

<h3>Edit Race</h3>

<form action="{{ route('races.update', $race->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $race->title) }}" placeholder="Enter Title" style="color: black;"/>
        @error('title')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="location">Location</label>
        <input type="text" name="location" id="location" value="{{ old('location', $race->location) }}" placeholder="Enter Location" style="color: black;"/>
        @error('location')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="difficulty">Difficulty</label>
        <input type="text" name="difficulty" id="difficulty" value="{{ old('difficulty', $race->difficulty) }}" placeholder="Enter Difficulty" style="color: black;"/>
        @error('difficulty')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="max_capacity">Max Capacity</label>
        <input type="text" name="max_capacity" id="max_capacity" value="{{ old('max_capacity', $race->max_capacity) }}" placeholder="Enter Max Capacity" style="color: black;"/>
        @error('max_capacity')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="inline-block bg-red-600 dark:bg-red-700 text-white px-4 py-2 font-bold hover:bg-red-800 dark:hover:bg-red-900 mb-4" >Submit</button>
</form>

<form action="{{ route('races.destroy', $race->id) }}" method="POST">
    @csrf
    @method('DELETE')
    
    <!-- Your input fields here -->
    
    <button type="submit" class="bg-red-600 text-white px-4 py-2 font-bold hover:bg-red-800">Delete</button>
</form>

@endsection
