@extends('layouts.admin')
@section('header')

        <h2 class="font-semibold text-xl text-white leading-tight flex items-center">
            Edit Car Details
            <span class="ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" height="1.25em" viewBox="0 0 320 512">
                    <style>svg{fill:#ffffff}</style>
                    <path d="M112 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm40 304V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V256.9L59.4 304.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c17.4-28.9 48.6-46.6 82.3-46.6h29.7c33.7 0 64.9 17.7 82.3 46.6l58.3 97c9.1 15.1 4.2 34.8-10.9 43.9s-34.8 4.2-43.9-10.9L232 256.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V352H152z"/>
                </svg>
            </span>

            <div class="flex-grow"></div>

            <div class="flex justify-end">
                <a href="{{ route('admin.cars.show', $car->id) }}" class="inline-block bg-yellow-500 text-white px-4 py-2 font-bold hover:bg-yellow-600">Back</a>
            </div>
        </h2>
    @endsection

    @section('content')
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form enctype="multipart/form-data" action="{{ route('admin.cars.update', $car->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="model" class="font-bold" style="color: black;">Model</label>
                        <input type="text" name="model" id="model" value="{{ old('model', $car->model) }}" placeholder="Enter Model" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500" style="color: black;">
                        @error('model')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="font-bold" style="color: black;">Description</label>
                        <input type="text" name="description" id="description" value="{{ old('description', $car->description) }}"placeholder="Enter Description" class="text-black w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500">
                        @error('description')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="manufacturer" class="font-bold" style="color: black;">Manufacturer</label>
                        <input type="text" name="manufacturer" id="manufacturer" value="{{ old('manufacturer', $car->manufacturer) }}" placeholder="Enter Manufacturer" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500" style="color: black;">
                        @error('manufacturer')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="type" class="font-bold" style="color: black;">Type</label>
                        <input type="text" name="type" id="type" value="{{ old('type', $car->type) }}" placeholder="Enter Type" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500" style="color: black;">
                        @error('type')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="fuel" class="font-bold" style="color: black;">Fuel</label>
                        <input type="text" name="fuel" id="fuel" value="{{ old('fuel', $car->fuel) }}" placeholder="Enter Fuel" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500" style="color: black;">
                        @error('fuel')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="colour" class="font-bold" style="color: black;">Colour</label>
                        <input type="text" name="colour" id="colour" value="{{ old('colour', $car->colour) }}" placeholder="Enter Colour" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500" style="color: black;">
                        @error('colour')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="vin" class="font-bold" style="color: black;">VIN</label>
                        <input type="text" name="vin" id="vin" value="{{ old('vin', $car->vin) }}" placeholder="Enter VIN" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500" style="color: black;">
                        @error('vin')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="vrm" class="font-bold" style="color: black;">VRM</label>
                        <input type="text" name="vrm" id="vrm" value="{{ old('vrm', $car->vrm) }}" placeholder="Enter VRM" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500" style="color: black;">
                        @error('vrm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label style="color: black;" class="font-bold" for="driver_id">Driver</label>
                        <select name="driver_id" id="driver_id" class="border border-gray-300 p-2 rounded w-full">
                            <option value="" selected disabled>Select Driver</option>
                            @foreach ($drivers as $driver)
                                <option value="{{ $driver->id }}" {{ old('driver_id', $car->driver_id) == $driver->id ? 'selected' : '' }}>
                                    {{ $driver->first_name }} {{ $driver->last_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('driver_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label style="color: black;" class="font-bold" for="car_image">Car Image</label>
                        <input type="file" name="car_image" id="car_image" class="border border-gray-300 p-2 rounded w-full" value="{{ old('car_image', $car->car_image) }}">
                        @error('car_image')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        @if($car->car_image)
                            <div style="color: black;" class="mb-4">
                                <img width="100" src="{{ asset("storage/images/" . $car->car_image) }}" alt="Current Car Image">
                            </div>
                        @endif
                    </div>

                    <div class="flex justify-between">
                        <form action="{{ route('admin.cars.update', $car->id) }}" method="POST">
                            @csrf
                        <button type="submit" class="inline-block bg-red-600 text-white px-4 py-2 font-bold hover:bg-red-800 mb-4">Submit</button>
                        </form>
                
                        <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="inline-block bg-red-600 text-white px-4 py-2 font-bold hover:bg-red-800 mb-4">Delete</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection