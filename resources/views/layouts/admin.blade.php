<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <script src="https://use.fontawesome.com/ce85b01e63.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css')}}"/>
    <title>Dashboard</title>
</head>
<body>
<div class="contain">
    @include('admin.includes.sidebar')

    <div class="main">

@include('admin.includes.header')

@yield('content')


@include('admin.includes.footer')
    </div>
</div>
<script src="{{ asset('js/dashboard.js')}}"></script>
@yield('script')
</body>
</html>
