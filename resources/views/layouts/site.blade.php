
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/home.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/card.css')}}" />
    <title>landing page</title>
</head>
<body>
<!-- header section  -->
@include('front.includes.nav')

<!-- end header section  -->


<!-- product section  -->
@yield('content')
<!-- end product section  -->

<script src="{{ asset('js/home.js')}}"></script>
</body>
</html>
