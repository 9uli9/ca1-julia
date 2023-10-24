@extends('layouts.myApp')
@section('content')

<h3>Edit Driver</h3>
<form action="{{ route('drivers.update', $driver->id) }}" method="POST"> 
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title </label> 
        <input type="text" name="title" id="title" value="{{ old('title') ? : $todo->title }}"/>
        @if($errors->has('title'))
        <span> {{$errors->first('title')}}</span>
        @endif
    </div>

    <div>
        <label for="body">Description</label> 
        <input type="text" name="body" id="body" value="{{ old('body') ? : $todo->body }}"/>
        @if($errors->has('body'))
        <span> {{$errors->first('body')}}</span>
        @endif
    </div>
    <button type="submit">Update</button>
</form>
@endsection
