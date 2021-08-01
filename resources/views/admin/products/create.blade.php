@extends('layouts.admin')


@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Create Product</h2>
                <a href="{{route('admin.products') }}" class="btnn">Back to Products</a>
            </div>
            <div class="container">
                <form class="form" action="{{route('admin.products.store')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                               placeholder="Enter name">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Author</label>
                        <input type="text" name="author" class="form-control" id="author">
                        @error('author')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Publication Date</label>
                        <input type="text" name="pub_date" class="form-control" id="pub_date">
                        @error('pub_date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Price</label>
                        <input type="number" name="price" class="form-control" id="price">
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Type</label>
                        <input type="text" name="type" class="form-control" id="type">
                        @error('type')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Category</label>
                        <input type="text" name="category" class="form-control" id="category ">
                        @error('category ')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
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
