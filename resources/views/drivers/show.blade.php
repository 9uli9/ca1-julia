@extends('layouts.myApp')
@section('content')

<h1>Show Driver</h1>
<p>{{ $driver->first_name }}</p>
<p>{{ $driver->last_name }}</p>
<p>{{ $driver->age }}</p>
<p>{{ $driver->league_type }}</p>

 <div>
    <a href="{{route('drivers.edit', $driver->id)}}">Edit</a>

    <form method="POST" action="{{ (route('drivers.destroy', $driver->id)) }}">
        @csrf
        @method('DELETE')
    <button type="submit" class="inline-block bg-red-600 dark:bg-red-700 text-white px-4 py-2 font-bold hover:bg-red-800 dark:hover:bg-red-900">Delete</button>
    </form>
 </div>

@endsection