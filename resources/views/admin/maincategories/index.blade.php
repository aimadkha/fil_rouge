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
                @isset($categories)
                    @foreach($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td><span class="status delevered">{{$category->active}}</span></td>
                    <td>
                        <button class="btn btn-success">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
        </div>
    </div>

@endsection
