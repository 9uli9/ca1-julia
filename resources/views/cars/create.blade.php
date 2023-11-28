<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight flex items-center">
            Create Driver
            <span class="icon-padding ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" height="1.25em" viewBox="0 0 320 512">
                    <style>svg{fill:#ffffff}</style>
                    <path d="M112 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm40 304V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V256.9L59.4 304.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c17.4-28.9 48.6-46.6 82.3-46.6h29.7c33.7 0 64.9 17.7 82.3 46.6l58.3 97c9.1 15.1 4.2 34.8-10.9 43.9s-34.8 4.2-43.9-10.9L232 256.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V352H152z"/>
                </svg>
            </span>
        </h2>

        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('cars.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="brand" style="color: black" class="font-bold">Brand</label>
                        <input type="text" name="brand" id="brand" placeholder="Enter Brand" style="color: black;" value="{{ old('brand') }}"/>
                        @error('brand')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="colour"  style="color: black" class="font-bold">Colour</label>
                        <input type="text" name="colour" id="colour" placeholder="Enter Colour" style="color: black;" value="{{ old('colour') }}"/>
                        @error('colour')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="driver"  style="color: black" class="font-bold">Driver</label>
                        <input type="text" name="driver" id="driver" placeholder="Enter Driver" style="color: black;" value="{{ old('driver') }}"/>
                        @error('driver')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- 
                    <div class="mb-4">
                        <label for="driver_id" class="block font-bold mb-1" placeholder="Select Driver">Select Driver:</label>
                        <select name="driver_id" id="driver_id" class="border border-gray-300 p-2 w-full">
                            <option value="" disabled selected>Select Driver</option>
                            @foreach ($drivers as $driver)
                                <option value="{{ $driver->id }}">{{ $driver->first_name }} {{ $driver->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    --}}

                    <button class="inline-block bg-red-600 dark:bg-red-700 text-white px-4 py-2 font-bold hover:bg-red-800 dark:hover:bg-red-900" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
