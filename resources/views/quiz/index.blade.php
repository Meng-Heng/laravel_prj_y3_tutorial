@extends('layout.backend')
@section('content')

    <h1>Quiz Agenda</h1>
    @if(Session::has('quiz_deleted'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Deleted! </strong> {!! session('quiz_deleted') !!}
    </div>
    @endif  

    @if(Session::has('quiz_created'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Created! </strong> {!! session('quiz_created') !!}
    </div>
    @endif  

        {{ Form::open(array('method'=>'get')) }} 
        <div class="input-group">
            {{ Form::text('keyword',$keyword ?? '', array('placeholder'=>'Search', 'class'=>'form-control')) }}
            <span class="input-group-btn">
                {{ Form::submit('Search',array('class'=>'btn btn-primary')) }}
            </span>
        </div>
        {{ Form::close() }}

    @if (count($tbl_quizzes) > 0)
    <table class="table table-bordered">
            <br>
            <a class="btn btn-primary" href="{{url('/quiz/create')}}">Create</a> &nbsp;
            <!-- <a class="btn btn-secondary" href="{{route('frontend.list')}}">Back</a> -->
            <br><br>
        <thead>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th colspan="2">Operation</th>
        </thead>
        <tbody>
            @foreach ($tbl_quizzes as $quiz)
            <tr>
                <!-- <td>{{$quiz->id}}</td> -->
                <td><a href="{{ url('/quiz/' . $quiz->id) }}">{!! $quiz->title !!}</a></td>
                <td>{{$quiz->description}}</td>
                <td>{{$quiz->date}}</td>
                <td><a class="btn btn-primary" href="{!! url('quiz/' . $quiz->id . '/edit') !!}">Edit</a></td>
                <td>
                    {!! Form::open(array('url'=>'quiz/'. $quiz->id, 'method'=>'DELETE')) !!}
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button class="btn btn-danger">Delete</button>
                    {!! Form::close() !!}
                </td>         
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
@endsection

