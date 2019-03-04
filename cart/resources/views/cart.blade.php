@extends('home')
@section('content')
    <div class="col-md-12">


        @if(!Session::has('cart'))
            <h3 class="text-center text-dark mt-5">Không có sản phẩm nào</h3>
        @else
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Name Product</th>
                    <th>Amount</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Money</th>
                </tr>
                </thead>
                <tbody>
                @foreach($carts as $key=> $product)

                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['total'] }}</td>
                        <td><img src="{{ asset("storage/".$product['img'])}}" width="120" height="100"></td>
                        <td>{{ $product['price'].'$' }}</td>
                        <td>{{ $product['price']*$product['total'].'$' }}</td>
                        <td><a href="{{route('delete.cart',$product['id'])}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php $total += $product['price'] * $product['total']  ?>
                @endforeach
                </tbody>
            </table>
        @endif
        <p>Total: {{$total}}$</p>
        <div class="text-center">
            <a href="{{route('index')}}" class="btn btn-success">Buy Continue</a>
            <a href="{{route('del.cart')}}" class="btn btn-success">Delete All</a>
        </div>

    </div>


@endsection