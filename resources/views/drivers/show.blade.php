@extends('layouts.myApp')
@section('content')

<h1>Show Driver</h1>
<p>{{ $todo->first_name }}</p>
<p>{{ $todo->last_name }}</p>
<p>{{ $todo->age }}</p>
<p>{{ $todo->league_type }}</p>

 <div>
    <a href="{{route('drivers.edit', $driver->id)}}">Edit</a>

    <form method="POST" action="{{ (route('drivers.destroy', $driver->id)) }}">
        @csrf
        @method('DELETE')
    <button type="submit">Delete</button>
    </form>
 </div>

@endsection