@extends('layouts.admin')


@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Main Categories</h2>
                <a href="{{route('admin.maincategories') }}" class="btnn">Back to main Category</a>
            </div>
            <div class="container">
                <form class="form" action="{{route('admin.maincategories.stor')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                               placeholder="Enter name">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug">
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
