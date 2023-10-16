@extends('layout.frontend')
@section('content')
<div class="container">
    
    <div class="row">
        <br>
                @if (count(array($categories)) > 0)
            <!-- <div class="col-md-12"> -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach($categories as $category)
                        <li><a href="{{url('/frontend/'.$category->id)}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </li>
    
            <!-- </div> -->
                @endif
        <br><br><br>
        @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <a href="{{url('/filter/'.$product->id)}}">
                    <img src="/product/{{$product->image}}" width="200px" alt="">
                </a>
                
                <div class="caption">
                    <h4>{{ $product->name }}</h4>
                    <p>{{ $product->description }}</p>
                    <p><strong>Price: </strong> {{ $product->price }}$</p>
                    <p class="btn-holder"><a href="#" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Pagination -->
    {{-- $products->appends(request()->input())->links(); --}}
    {{ $products->links('pagination::bootstrap-5');}}
</div>
@endsection