@extends('layouts.admin')


@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Edit Store</h2>
                <a href="{{route('admin.vendors') }}" class="btnn">Back to main Store</a>
            </div>
            <div class="container">
                <form class="form" action="{{route('admin.vendors.update', $vendor->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$vendor -> id}}">
                    <div class="form-group">
                        <label for="name">Store Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                               placeholder="Enter name" value="{{$vendor->name}}">

                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Number Phone</label>
                        <input type="text" name="mobile" class="form-control" id="mobile" value="{{$vendor->mobile}}">
                        @error('mobile')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Address</label>
                        <input type="text" name="address" class="form-control" id="address"
                               value="{{$vendor->address}}">
                        @error('address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{$vendor->email}}">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <img src="{{$vendor->logo}}" class="w-25">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo">Logo</label>
                        <input type="file" class="form-control" name="logo" id="photo">
                        @error('logo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group select2bs4">
                        <label for="exampleFormControlSelect1">Main Categories</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category">
                            <optgroup label="please choose category">
                                {{--                                <option>category</option>--}}
                                @if($categories && $categories->count() > 0)
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                                @if($vendor->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                @endisset
                            </optgroup>
                        </select>
                        @error('category')
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
