@extends('layout.frontend')
@section('content')

    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="/product/{{$products->image}}" alt="..." /></div>
            </div>
                <div class="col-md-6">
                <div class="small mb-1">SKU: {{$products->id}}</div>
                <h1 class="display-5 fw-bolder">{{$products->name}}</h1>
                <div class="fs-5 mb-5">
                    <span>{{$products->price}}</span>
                </div>
                <p class="lead">
                    {{$products->description}}
                </p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection