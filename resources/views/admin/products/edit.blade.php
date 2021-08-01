@extends('layouts.admin')


@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Edit Category : {{}}</h2>
                <a href="{{route('admin.products') }}" class="btnn">Back to Product</a>
            </div>
            <div class="container">
                <form class="form" action="{{route('admin.maincategories.update', $mainCategory->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <input name="id" value="{{$mainCategory->id}}" type="hidden">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                               value="{{$mainCategory->name}}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{$mainCategory->slug}}">
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <img src="{{$mainCategory->photo}}" class="w-25">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" name="photo" id="photo">
                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
