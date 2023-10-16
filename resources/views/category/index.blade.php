@extends('layout.backend')
@section('content')
    <h1>Category</h1>
    @if(Session::has('category_deleted'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Deleted! </strong> {!! session('category_deleted') !!}
    </div>
    @endif  

    @if(Session::has('category_created'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Created! </strong> {!! session('category_created') !!}
    </div>
    @endif  

    @if (count($categories) > 0)
    <table class="table table-bordered">
            <br>
            <a class="btn btn-primary" href="{{url('/category/create')}}">Create</a> &nbsp;
            <a class="btn btn-secondary" href="{{route('frontend.list')}}">Back</a>
            <br><br>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th colspan="2">Operation</th>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{ url('/category/' . $category->id) }}">{!! $category->name !!}</a></td>
                <!-- <td>{{$category->description}}</td> -->
                <td><a class="btn btn-primary" href="{!! url('category/' . $category->id . '/edit') !!}">Edit</a></td>
                <td>
                    {!! Form::open(array('url'=>'category/'. $category->id, 'method'=>'DELETE')) !!}
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
    
    <script>
    $(".delete").click(function() {
        var form = $(this).closest('form');
        $('<div></div>').appendTo('body')
            .html('<div><h6> Are you sure ?</h6></div>')
            .dialog({
                modal: true,
                title: 'Delete message',
                zIndex: 10000,
                autoOpen: true,
                width: 'auto',
                resizable: false,
                buttons: {
                    Yes: function() {
                        $(this).dialog('close');
                        form.submit();
                    },
                    No: function() {
                        $(this).dialog("close");
                        return false;
                    }
                },
                close: function(event, ui) {
                    $(this).remove();
                }
            });
        return false;
    });
</script>
@endsection

