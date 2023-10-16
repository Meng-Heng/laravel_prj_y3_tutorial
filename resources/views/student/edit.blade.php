@extends('layout.backend')
@section('content')
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Edit Information</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="/student">View all</a></li>
			<!-- <li class="breadcrumb-item active"><a href="product/create">Create post</a></li> -->
		</ol>
		<div class="card mb-4">
			<div class="card-body">
            @if(Session::has('student_update'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Updated!</strong> {!! session('student_update') !!}
                </div>
                @endif
                @if (count($errors) > 0)
                <!-- Form Error List -->
                <div class="alert alert-danger">
                    <strong>Something is Wrong</strong>
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                {!! Form::model($students , array('route' => array('student.update', $students->id), 'method'=>'PUT','files'=>'true')) !!}
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name',null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('gender', 'Gender:') !!}
                {!! Form::text('gender',null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('phone', 'Phone Number:') !!}
                {!! Form::text('phone',null, array('class'=>'form-control')) !!}

                {!! Form::label('address', 'Address:') !!}
                {!! Form::text('address',null, array('class'=>'form-control')) !!}

                {!! Form::label('image', 'Photo:') !!}  
                {!! Form::file('image', array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('parent_contact', 'Parent\'s Phone Number:') !!}
                {!! Form::text('parent_contact',null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
                <a class="btn btn-primary" href="{!! url('/student')!!}">Back</a>
                {!! Form::close() !!}
			</div>
		</div>
	</div>
</main>
@endsection