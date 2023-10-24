@extends('layouts.myApp')
@section('content')

<h1>Show Todo</h1>
<p>{{ $todo->title }}</p>
<p>{{ $todo->body }}</p>

 <div>
    <a href="{{route('todos.edit', $todo->id)}}">Edit</a>

    <form method="POST" action="{{ (route('todos.destroy', $todo->id)) }}">
        @csrf
        @method('DELETE')
    <button type="submit">Delete</button>
    </form>
 </div>

@endsection