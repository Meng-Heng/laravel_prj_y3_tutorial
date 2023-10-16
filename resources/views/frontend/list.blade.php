@extends('layout.frontend')
@section('content')

@if(session('success'))
            <div class="alert alert-primary alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Added!</strong> {{ session('success') }}
            </div>
        @endif

<div class="container d-flex align-items-center justify-content-center">
    <br>
    <div class="row">
        @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <a href="{{url('/detail/'.$product->id)}}">
                    <img src="product/{{$product->image}}" width="200px" alt="">
                </a>    
                <div class="caption">
                    <h4>{{ $product->name }}</h4>
                    <p>{{ $product->description }}</p>
                    <p><strong>Price: </strong> {{ $product->price }}$</p>
                    <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Pagination -->
    {{ $products->links('pagination::bootstrap-5');}}
</div>
@endsection

