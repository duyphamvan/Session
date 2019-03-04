@extends('home')
@section('content')

    @if(!isset($products))
        <p>Khong co du lieu</p>
    @else
        <h2 class="text-center mt-5">List Product</h2>
        <div class="card-group">
            @foreach($products as $key => $product)
                <div class="col-sm-4 mb-3" style="height: 450px">
                <div class="card">
                    <img src="{{asset("storage/$product->image")}}" class="card-img-top img-fluid" alt="..." style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title">Name Product: {{$product->name}}</h5>
                        <p class="card-text"> Price Product: {{$product->price}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('show',$product->id)}}" class="btn btn-info">Show</a>
                        <a href="{{route('store.cart', $product->id)}}" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
                </div>
            @endforeach
            @endif

        </div>
        {{--<a href="{{route('create')}}" class="btn btn-primary">Create New Product</a>--}}
@endsection

















{{--<a href="{{route('edit',$product->id)}}" class="btn btn-warning">Edit</a>--}}
{{--<a href="{{route('show',$product->id)}}" class="btn btn-info">Show</a>--}}
{{--<a href="{{route('delete',$product->id)}}" class="btn btn-danger">Remove</a>--}}