@extends('layouts.site')

@section('content')
    <section class="banner" id="banner">
        <div class="content">
            <h2>Always Choose Good</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed dolor
                sunt asperiores? Consectetur eos omnis amet. Quis iure saepe?
                Voluptatibus, maiores voluptate.
            </p>
            <a href="#" class="btnn">Our Books</a>
        </div>
    </section>

    <section class="menu" id="menu">
        <div class="title">
            <h2 class="titleText">Our <span>B</span>ooks</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. ?</p>
        </div>
        <div class="content">
            <div class="card-row">
                @isset($products)
                    @foreach($products as $product)
                <div class="card" id="card">
                    <img class="card-image" id="card-image" src="{{$product->product_img}}" />

                    <div class="card-footer">
                        <h3 class="card-title">{{$product->product_name}}</h3>
                        <p class="card-text">
                            by
                            <span class="card-author">{{$product->product_author}}</span>
                        </p>
                        <p class="card-text">{{$product->product_price}}<span> DH</span></p>
{{--                        <form action="{{'site.cart.add', $product->id}}" method="get" id="paymentForm">--}}
{{--                            @csrf--}}
                            <p>
                                <a href="{{route('site.cart.add', $product->id)}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    Add to Cart</a><br>
{{--                                <a href="#">Order Now</a>--}}
                            </p>
{{--                        </form>--}}

                    </div>
                </div>
                    @endforeach
                @endisset
            </div>
        </div>
        <div class="clear"></div>
        <div class="title">
            <a href="#" class="btnn">View All</a>
        </div>

    </section>
    <!-- about section  -->
    <section class="about" id="about">
        <div class="row">
            <div class="col50">
                <h2 class="titleText"><span>A</span>bout Us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio impedit culpa, laboriosam excepturi
                    consequatur nemo omnis aliquam labore atque in error veniam quas sunt dolore tenetur ullam quidem ut
                    voluptatem eos nisi ratione! Ratione temporibus, quibusdam molestias quam voluptates aspernatur
                    praesentium excepturi eius voluptatem aperiam modi sunt iure reprehenderit dolores!</p><br>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur ab explicabo optio nam quae
                    fugiat, pariatur totam deleniti soluta fuga ad ratione enim, nesciunt repellat at id iusto
                    illum.</p>
            </div>
            <div class="col50">
                <div class="imgBx">
                    <img src="../../../public/assets/images/about.svg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->

@endsection
