@extends('layouts.myApp')
@section('content')

<h1>Show race</h1>
<p>{{ $race->title }}</p>
<p>{{ $race->location }}</p>
<p>{{ $race->difficulty }}</p>
<p>{{ $race->max_capacity }}</p>
<p>{{ $race->start_date }}</p>

 <div>
    <a href="{{route('races.edit', $race->id)}}">Edit</a>

    <form method="POST" action="{{ (route('races.destroy', $race->id)) }}">
        @csrf
        @method('DELETE')
    <button type="submit" class="inline-block bg-red-600 dark:bg-red-700 text-white px-4 py-2 font-bold hover:bg-red-800 dark:hover:bg-red-900">Delete</button>
    </form>
 </div>

@endsection