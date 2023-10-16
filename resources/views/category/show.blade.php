@extends('layout.backend')
@section('content')
    <center>

    <h1><u>Category details</u></h1>
    <br>
    <h4>Name: {{$categories->name}}</h4>
    <p><b>Description: {{$categories->description}}</b></p>
    <br>
    <a class="btn btn-primary" href="{{route('category.index')}}">Back</a>
</center>
@endsection