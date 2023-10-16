@extends('layout.backend')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Add a Student Information</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/student')}}">Student list</a></li>
            <!-- <li class="breadcrumb-item active">Category</li> -->
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('student_created'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Completed!</strong> {!! session('student_created') !!}
                </div>
                @endif
                @if (count($errors) > 0)
                <!-- Form Error List -->
                <div class="alert alert-danger">
                    <strong>Something is Wrong</strong>
                    <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- It Create the new Category -->

                {!! Form::open(array('url'=>'student', 'files'=>'true')) !!}
               
                <br>
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name','', array('class'=>'form-control')) !!}

                <br>
                {!! Form::label('gender', 'Gender:') !!}
                {!! Form::text('gender',null, array('class'=>'form-control')) !!}
                <br>   
                {!! Form::label('phone', 'Phone Number:') !!}
                {!! Form::text('phone',null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('address', 'Address:') !!}
                {!! Form::text('address',null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('image', 'Photo:') !!}
                {!! Form::file('image', array('class'=>'form-control')) !!}
                <br>  
                {!! Form::label('parent_contact', 'Parent\'s Phone Number:') !!}
                {!! Form::text('parent_contact',null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-secondary" href="{!! url('/student')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
    </div>
</main>


@endsection