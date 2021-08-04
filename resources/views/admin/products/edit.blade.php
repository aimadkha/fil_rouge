@extends('layouts.admin')


@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>edit Product</h2>
                <a href="{{route('admin.products') }}" class="btnn">Back to Products</a>
            </div>
            <div class="container">
                <form class="form" action="{{route('admin.products.update', $product->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <input name="id" value="{{$product->id}}" type="hidden">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                               value="{{$product->product_name}}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Author</label>
                        <input type="text" name="author" class="form-control" id="author"
                               value="{{$product->product_author}}">
                        @error('author')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Publication Date</label>
                        <input type="text" name="pub_date" class="form-control" id="pub_date" value="{{$product->product_pub_date}}">
                        @error('pub_date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Price</label>
                        <input type="number" name="price" class="form-control" id="price" value="{{$product->product_price}}">
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Type</label>
                        <input type="text" name="type" class="form-control" id="type" value="{{$product->product_price}}">
                        @error('type')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Category</label>
                        <input type="text" name="category" class="form-control" id="category" value="{{$product->product_category}}">
                        @error('category ')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <img src="{{$product->product_img}}" class="w-25">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" name="photo" id="photo">
                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1"
                                onclick="history.back();">
                            <i class="ft-x"></i> back
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> Submit
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
