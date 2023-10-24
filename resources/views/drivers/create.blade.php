@extends('layouts.myApp')

@section('content')

<h3>Create Driver</h3>

{{-- @if ($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@if($errors->has('title'))
<span> {{ $errors->first('title')}} </span>
@endif --}}


<form action="{{route('drivers.store')}}" method="POST">
    @csrf
    <div>
        <label for="title">Title </label> 
        <input type="text" name="title" id="title"/>
        @if($errors->has('title'))
        <span> {{$errors->first('title')}}</span>
        @endif
    </div>

    <div>
        <label for="body">Description</label> 
        <input type="text" name="body" id="body"/>
        @if($errors->has('body'))
        <span> {{$errors->first('body')}}</span>
        @endif
    </div>
    <button type="submit" >Submit</button>
</form>

@endsection
