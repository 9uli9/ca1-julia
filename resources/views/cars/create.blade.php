@extends('layouts.myApp')

@section('content')

<h3>Create Car</h3>

<form action="{{ route('cars.store') }}" method="POST">
    @csrf

    <div class="mb-4"> <!-- Added mb-4 class -->
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter Name" style="color: black;"/>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4"> <!-- Added mb-4 class -->
        <label for="brand">Brand</label>
        <input type="text" name="brand" id="brand"  placeholder="Enter Brand" style="color: black;"/>
        @error('brand')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4"> <!-- Added mb-4 class -->
        <label for="colour">Colour</label>
        <input type="text" name="colour" id="colour" placeholder="Enter colour" style="color: black;"/> 
        @error('colour')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="driver_id"  class="block font-bold mb-1" placeholder="Select Driver" >Select Driver:</label>
        <select name="driver_id" id="driver_id" class="border border-gray-300 p-2  w-full" style="color: black;">
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}">{{ $driver->name }}</option>
            @endforeach
        </select>
    </div>

    <button class="inline-block bg-red-600 dark:bg-red-700 text-white px-4 py-2 font-bold hover:bg-red-800 dark:hover:bg-red-900" type="submit">Submit</button>
</form>

@endsection
