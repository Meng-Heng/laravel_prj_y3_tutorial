@extends('layout.backend')
@section('content')
    @if(Session::has('quiz_update'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Updated!</strong> {!! session('quiz_update') !!}
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
    {{ Form::model($quiz , array('route' => array('quiz.update', $quiz->id), 'method'=>'PUT')) }}
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
@endsection
