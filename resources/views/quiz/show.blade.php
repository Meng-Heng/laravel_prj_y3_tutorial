@extends('layout.backend')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Quiz Detail</h1>
		<div class="card">
            <div class="card-body">
                <p>ID: {{$quiz->id}} </p>
                <p>Title: {{$quiz->title}}</p>
                <p>Description: {{$quiz->description}}</p>
                <p>Date: {{$quiz->date}}</p>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{url('/quiz')}}">Back</a>
	</div>
</main>
@endsection