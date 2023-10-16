@extends('layout.backend')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Student Detail</h1>
		<div class="card">
            <div class="card-body">
                <p>ID: {{$students->id}} </p>
                <p>Name: {{$students->name}}</p>
                <p>Gender: {{$students->gender}}</p>
                <p>Phone Number: {{$students->phone}}</p>
                <p>Address: {{$students->address}}</p>
                <p>Parent's Phone Number: {{$students->parent_contact}}</p>
                <div>{!! Html::image('/img/'.$students->image, $students->name, array('width'=>'300')) !!}</div>
            </div>
		</div>
        <br>
        <a class="btn btn-secondary" href="{{url('/student')}}">Back</a>
	</div>
</main>
@endsection