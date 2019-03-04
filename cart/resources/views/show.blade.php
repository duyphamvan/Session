@extends('home')
@section('content')
    <h3 class="text-center mt-4">Product</h3>
    <div class="col-md-6 offset-md-3 mt-3 show">
        <div class="card text-center">
            <img src="{{asset("storage/$product->image")}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Name Product: {{$product->name}}</h5>
                <p class="card-text"> Price Product: {{$product->price}}</p>
                <p class="card-text"> Vote: {{$product->vote}}</p>
            </div>
        </div>
        <div class="footer">
            <a href="{{route('store.cart',$product->id)}}" class="btn btn-success">Buy Now</a>
            <a href="{{route('index')}}" class="btn btn-info">Back</a>
        </div>
    </div>

@endsection