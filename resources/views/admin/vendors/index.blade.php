@extends('layouts.admin')


@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Stores</h2>
                <a href="{{ route('admin.vendors.create') }}" class="btnn">Add Store</a>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Store</th>
                    <th>Logo</th>
                    <th>Number Phone</th>
                    <th>Main Category</th>
                    <th>Control</th>

                </tr>
                </thead>
                <tbody>
                @isset($vendors)
                    @foreach($vendors as $vendor)

                <tr>
                    <td>{{$vendor->name}}</td>

                    <td><img src="{{$vendor->logo}}" class="w-25"></td>
                    <td>{{$vendor->mobile}}</td>
                    <td>{{$vendor->category->name}}</td>
                    <td>
                        <a href="{{route('admin.vendors.edit',$vendor->id)}}"><button class="btn btn-success">Edit</button></a>
                        <a href="{{ route('admin.vendors.delete', $vendor->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
        </div>
    </div>

@endsection
