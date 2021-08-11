<header>
    <a href="#" class="logo">Book<span>.</span></a>
    <ul class="navigation">
        <li><a href="#banner">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#expert">Expert</a></li>
        @auth()
            <li><a href="{{route('user.profile')}}"><i class="fa fa-user" aria-hidden="true"></i> Account</a></li>
        @else
            <li><a href="{{route('get.user.login')}}"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>
        @endauth
    </ul>
</header>
