
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight flex items-center">
            Edit Driver Details
            <span class="icon-padding ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" height="1.25em" viewBox="0 0 320 512">
                    <style>svg{fill:#ffffff}</style>
                    <path d="M112 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm40 304V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V256.9L59.4 304.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c17.4-28.9 48.6-46.6 82.3-46.6h29.7c33.7 0 64.9 17.7 82.3 46.6l58.3 97c9.1 15.1 4.2 34.8-10.9 43.9s-34.8 4.2-43.9-10.9L232 256.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V352H152z"/>
                </svg>
            </span>
        </h2>

            <div class="flex-grow"></div>

            <div class="flex justify-end">
                <a href="{{ route('admin.drivers.show', $driver->id) }}" class="inline-block bg-yellow-500 dark:bg-yellow-600 text-white px-4 py-2 font-bold hover:bg-yellow-600 dark:hover:bg-yellow-700">Back</a>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.drivers.update', $driver->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="first_name" style="color: black;" class="font-bold">First Name</label>
                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $driver->first_name) }}" placeholder="Enter First Name" class="text-black w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500 text-black">

                        @error('first_name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label style="color: black;" class="font-bold" for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $driver->last_name) }}" placeholder="Enter Last Name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500" style="color: black;">
                        @error('last_name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label style="color: black;" class="font-bold" for="age">Age</label>
                        <input type="text" name="age" id="age" value="{{ old('age', $driver->age) }}" placeholder="Enter Age" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500" style="color: black;">
                        @error('age')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label style="color: black;" class="font-bold" for="league_type">League Type</label>
                        <select name="league_type" id="league_type" class="border border-gray-300 p-2 rounded w-full">
                            <option value="" selected disabled>Select League Type</option>
                            @foreach ($leagueTypes as $type)
                                <option value="{{ $type }}" {{ old('league_type', $driver->league_type) == $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach

                        </select>
                        @error('league_type')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- <div class="mb-4">
                        <label style="color: black;" class="font-bold" for="car">Car</label>
                        <select name="car_id" id="car_id" class="border border-gray-300 p-2 rounded w-full">
                            <option value="" selected disabled>Select Car</option>
                            @foreach ($cars as $car)
                                <option value="{{ $car->id }}" {{ old('car_id', $driver->car_id) == $car->id ? 'selected' : '' }}>
                                    {{ $car->model }} ({{ $car->vrm }})
                                </option>
                            @endforeach
                        </select>
                        @error('car_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div> --}}

                    <div class="mb-4">
                        <label style="color: black;" class="font-bold" for="cars">Cars</label>
                        <select name="car_ids[]" id="car_ids" class="border border-gray-300 p-2 rounded w-full" multiple>
                            <option value="" disabled>Select Cars</option>
                            @foreach ($cars as $car)
                                <option value="{{ $car->id }}" {{ in_array($car->id, old('car_ids', $driver->cars->pluck('id')->toArray()) ?: []) ? 'selected' : '' }}>
                                    {{ $car->model }} ({{ $car->vrm }})
                                </option>
                            @endforeach
                        </select>
                        @error('car_ids')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    
                    
                    <div class="flex justify-between">
                        <button type="submit" class="inline-block bg-red-600 dark:bg-red-700 text-white px-4 py-2 font-bold hover:bg-red-800 dark:hover:bg-red-900 mb-4">Submit</button>
                
                        <form action="{{ route('admin.drivers.destroy', $driver->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="inline-block bg-red-600 dark:bg-red-700 text-white px-4 py-2 font-bold hover:bg-red-800 dark:hover:bg-red-900 mb-4">Delete</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

