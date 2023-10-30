@extends('layouts.myApp')

@section('header')
    <h2 class="font-semibold text-xl text-red-600 dark:text-red-400 leading-tight">
        Drivers
    </h2>
@endsection

@section('content')
    <a href="{{ route('drivers.create') }}" class="inline-block bg-red-600 dark:bg-red-700 text-white px-4 py-2 font-bold hover:bg-red-800 dark:hover:bg-red-900">Create</a>

    <ul role="list" class="divide-red-100 dark:divide-red-700">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-red-500 dark:text-red-400">
                <thead class="text-xs text-red-700 bg-red-50 dark:bg-red-700 dark:text-red-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            First name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Last Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Age
                        </th>
                        <th scope="col" class="px-6 py-3">
                            League Type
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($drivers as $driver)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-red-900 whitespace-nowrap dark:text-white">
                                {{ $driver->first_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $driver->last_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $driver->age }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $driver->league_type }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('drivers.edit', ['driver' => $driver->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-red-900 dark:text-white">
                                No Drivers found!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </ul>
@endsection
