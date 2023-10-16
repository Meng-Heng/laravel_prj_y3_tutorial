@extends('layout.backend')
@section('content')
        @if(Session::has('product_delete'))
        <div class="alert alert-danger alert-dismissible">
        
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('product_delete') !!}
            @endif
        </div>
        
        <div class="mx-4">
                @if (count($products) > 0)
                <a class="btn btn-primary" href="{{url('/product/create')}}">Create</a>
                <a class="btn btn-secondary" href="{{route('frontend.list')}}">Back</a>
                <div class="panel panel-default">
                
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Name</th>
                                <th>Category name</th>
                                <th>Image</th>
                                <th>Price</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <div class=""><a href="{{url('/product/'.$product->id)}}">{{ $product->name }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $product->category->name !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! Html::image('/product/'.$product->image, $product->name, array('width'=>'60')) !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $product->price !!}</div>
                                    </td>

                                    <td><a class="btn btn-primary" href="{!! url('product/' . $product->id . '/edit') !!}">Edit</a></td>

                                    <td>
                                        {!! Form::open(array('url'=>'product/'. $product->id, 'method'=>'DELETE')) !!}
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button class="btn btn-danger delete">Delete</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
                @endif
                @endsection