@extends('layouts.admin')


@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Main Categories</h2>
                <a href="{{ route('admin.maincategories.create') }}" class="btnn">Add Category</a>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Control</th>

                </tr>
                </thead>
                <tbody>
                @isset($vendors)
                    @foreach($vendors as $vendor)
                <tr>
                    <td>{{$vendor->name}}</td>
                    <td>{{$vendor->slug}}</td>
                    <td><img src="{{$vendor->photo}}" class="w-25"></td>
                    <td>
                        <a href="{{route('admin.maincategories.edit',$vendor->id)}}"><button class="btn btn-success">Edit</button></a>
                        <a href="{{ route('admin.maincategories.delete', $vendor->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
        </div>
    </div>

@endsection
