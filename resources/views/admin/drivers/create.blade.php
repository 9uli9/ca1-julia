
@extends('layouts.admin')
@section('header')
        <h2 class="font-semibold text-xl text-white leading-tight flex items-center">
            Create Driver
            <span class="icon-padding ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" height="1.25em" viewBox="0 0 320 512">
                    <style>svg{fill:#ffffff}</style>
                    <path d="M112 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm40 304V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V256.9L59.4 304.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c17.4-28.9 48.6-46.6 82.3-46.6h29.7c33.7 0 64.9 17.7 82.3 46.6l58.3 97c9.1 15.1 4.2 34.8-10.9 43.9s-34.8 4.2-43.9-10.9L232 256.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V352H152z"/>
                </svg>
            </span>
        </h2>
        
        @endsection

        @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.drivers.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="first_name" style="color: black" class="font-bold">First Name</label>
                        <input type="text" name="first_name" id="first_name" placeholder="Enter First name" style="color: black;">
                        @error('first_name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="last_name" style="color: black" class="font-bold">Last Name</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name" style="color: black;">
                        @error('last_name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="age" style="color: black" class="font-bold">Age</label>
                        <input type="text" name="age" id="age" placeholder="Enter Age" style="color: black;">
                        @error('age')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label style="color: black;" for="car_id" class="block font-bold mb-1" placeholder="Select Driver">Select Car:</label>
                        <select name="car_id[]" id="car_id" class="border border-gray-300 p-2 w-full" >
                            <option value="" disabled selected>Select Car</option>
                            @foreach ($cars as $car)
                                <option value="{{ $car->id }}">{{ $car->model }} {{ $car->vrm }}</option>
                            @endforeach
                        </select>
                        @error('car_id')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    



                    <button class="inline-block bg-red-600 dark:bg-red-700 text-white px-4 py-2 font-bold hover:bg-red-800 dark:hover:bg-red-900" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
