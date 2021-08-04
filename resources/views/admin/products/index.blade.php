@extends('layouts.admin')


@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Products</h2>
                <a href="{{ route('admin.products.create') }}" class="btnn">Add Product</a>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Author</th>
                    <th>Pub Date</th>
                    <th>Photo</th>
                    <th>Main Category</th>
                    <th>Price</th>
                    <th>type</th>
                    <th>Control</th>

                </tr>
                </thead>
                <tbody>
                @isset($products)
                    @foreach($products as $product)
                <tr>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_author}}</td>
                    <td>{{$product->product_pub_date}}</td>
                    <td><img src="{{$product->product_img}}" class="w-25"></td>
                    <td>{{$product->product_category}}</td>
                    <td>{{$product->product_price}}</td>
                    <td>{{$product->product_type}}</td>
                    <td>
                        <a href="{{route('admin.products.edit',$product->id)}}"><button class="btn btn-success">Edit</button></a>
                        <a href="{{ route('admin.products.delete', $product->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
        </div>
    </div>

@endsection
