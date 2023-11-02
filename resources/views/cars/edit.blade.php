@extends('layouts.myApp')

@section('content')

<h3>Edit Car</h3>

<form action="{{ route('cars.update', $car->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $car->name) }}" placeholder="Enter Name" style="color: black;"/>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="brand">Brand</label>
        <input type="text" name="brand" id="brand" value="{{ old('brand', $car->brand) }}" placeholder="Enter Brand" style="color: black;"/>
        @error('brand')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="colour">Colour</label>
        <input type="text" name="colour" id="colour" value="{{ old('colour', $car->colour) }}" placeholder="Enter colour" style="color: black;"/>
        @error('colour')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="driver_id" class="block font-bold mb-1">Select Driver:</label>
        <select name="driver_id" id="driver_id" class="border border-gray-300 p-2 rounded w-full">
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}" {{ old('driver_id', $car->driver_id) == $driver->id ? 'selected' : '' }}>
                    {{ $driver->name }}
                </option>
            @endforeach
        </select>
    </div>
    

    <button type="submit" class="inline-block bg-red-600 dark:bg-red-700 text-white px-4 py-2 font-bold hover:bg-red-800 dark:hover:bg-red-900 mb-4">Submit</button>
</form>

<form action="{{ route('cars.destroy', $car->id) }}" method="POST">
    @csrf
    @method('DELETE')
    
    <!-- Your input fields here -->
    
    <button type="submit" class="bg-red-600 text-white px-4 py-2 font-bold hover:bg-red-800">Delete</button>
</form>

@endsection
