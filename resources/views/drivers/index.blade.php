@extends('layouts.myApp')

 

@section('header')

<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

    Drivers

</h2>

@endsection

 

@section('content')

<a href="{{ route('drivers.create') }}" >Create</a>


<ul role="list" class="divide-y divide-gray-100">



  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

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

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

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

                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                </td>

            </tr>

        @empty

            <h4>No Drivers found!</h4>

        @endforelse

           

        </tbody>

    </table>

</div>

@endsection

