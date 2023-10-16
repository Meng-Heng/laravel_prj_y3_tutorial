@extends('layout.backend')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create a Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/category')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Category</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('category_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Completed!</strong> {!! session('category_created') !!}
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

                {!! Form::open(['url'=>'category']) !!}
               
                <br>
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name','', array('class'=>'form-control')) !!}

                <br>
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description',null, array('class'=>'form-control')) !!}
                <br>    
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-secondary" href="{!! url('/category')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
        <div style="height: 100vh"></div>
        <div class="card mb-4">
            <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
        </div>
    </div>
</main>


@endsection