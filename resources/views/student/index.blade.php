@extends('layout.backend')
@section('content')

    <h1>Student Information</h1>
    @if(Session::has('student_deleted'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Deleted! </strong> {!! session('student_deleted') !!}
    </div>
    @endif
    @if(Session::has('student_created'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Created! </strong> {!! session('student_created') !!}
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

    @if (count($students) > 0)
    <table class="table table-bordered">
            <br>
            <a class="btn btn-primary" href="{{url('/student/create')}}">Create</a> &nbsp;
            <br><br>
        <thead>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Photo</th>
            <th>Parent's Phone Number</th>
            <th colspan="2">Operation</th>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td><a href="{{ url('/student/' . $student->id) }}">{!! $student->name !!}</a></td>
                <td>{{$student->gender}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->address}}</td>
                <td>
                    <div>{!! Html::image('/img/'.$student->image, $student->name, array('width'=>'60')) !!}</div>
                </td>
                <td>{{$student->parent_contact}}</td>
                <td><a class="btn btn-primary" href="{!! url('student/' . $student->id . '/edit') !!}">Edit</a></td>
                <td>
                    {!! Form::open(array('url'=>'student/'. $student->id, 'method'=>'DELETE')) !!}
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

