@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-white leading-tight flex items-center space-x-2">
    Cars
    <span class="icon-padding">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-2" height="1.25em" viewBox="0 0 320 512">
            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <style>svg{fill:#ffffff}</style>
            <path d="M112 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm40 304V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V256.9L59.4 304.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c17.4-28.9 48.6-46.6 82.3-46.6h29.7c33.7 0 64.9 17.7 82.3 46.6l58.3 97c9.1 15.1 4.2 34.8-10.9 43.9s-34.8 4.2-43.9-10.9L232 256.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V352H152z"/>
        </svg>
    </span>
</h2>

<div class="flex justify-end">
    <a href="{{ route('cars.create') }}" class="inline-block bg-green-600 dark:bg-green-700 text-white px-4 py-2 font-bold hover:bg-green-800 dark:hover:bg-green-900 ">Create</a>
</div>



@endsection

@section('content')


    <ul role="list" class="divide-red-100 dark:divide-red-700">
        <div class="relative overflow-x-auto shadow-md ">
            <table class="w-full text-sm text-left text-red-500 dark:text-red-400">
                <thead class="text-lg text-red-700 bg-red-50 dark:bg-red-700 dark:text-red-400">
                    <tr>
                        <th scope="col" class="px-6 py-3" >
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Brand
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Colour
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Driver
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cars as $car)
                        <tr class="bg-black dark:bg-black-800 border-b border-white-100 dark:border-white-700">
                            <th scope="row" class="px-6 py-4 font-medium text-red-900 whitespace-nowrap dark:text-white">
                                {{ $car->name }}
                            </th>
                            <td class="px-6 py-4 font-medium text-red-900 whitespace-nowrap dark:text-white">
                                {{ $car->brand }}
                            </td>
                            <td class="px-6 py-4 font-medium text-red-900 whitespace-nowrap dark:text-white">
                                {{ $car->colour }}
                            </td>
                            <td class="px-6 py-4 font-medium text-red-900 whitespace-nowrap dark:text-white">
                                {{ $car->driver->first_name }} {{ $car->driver->last_name }}
                            </td>
                            
                            
                            <td class="px-6 py-4 font-medium text-red-900 whitespace-nowrap dark:text-white">
                                <a href="{{ route('cars.edit', ['car' => $car->id]) }}" class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-red-900 dark:text-white">
                                No Cars found!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                
            </table>
        </div>
    </ul>
@endsection