@extends('layout.backend')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create a Exam</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/quiz')}}">Quiz list</a></li>
            <!-- <li class="breadcrumb-item active">Category</li> -->
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('quiz_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Completed!</strong> {!! session('quiz_created') !!}
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

                {!! Form::open(['url'=>'quiz']) !!}
               
                <br>
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title','', array('class'=>'form-control')) !!}

                <br>
                {!! Form::label('description', 'Description:') !!}
                {!! Form::text('description',null, array('class'=>'form-control')) !!}
                <br>   
                {!! Form::label('date', 'Date:') !!}
                {!! Form::text('date',null, array('class'=>'form-control')) !!}
                <br>  
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-secondary" href="{!! url('/quiz')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
    </div>
</main>


@endsection