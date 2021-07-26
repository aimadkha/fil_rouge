<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/home.css')}}" />
    <title>landing page</title>
</head>
<body>
<!-- header section  -->
<header>
    <a href="#" class="logo">Book<span>.</span></a>
    <ul class="navigation">
        <li><a href="#banner">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#expert">Expert</a></li>
        <li><a href="#testimonial">testimonoial</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</header>
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
<!-- end header section  -->
<!-- about section  -->
<section class="about" id="about">
    <div class="row">
        <div class="col50">
            <h2 class="titleText"><span>A</span>bout Us</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio impedit culpa, laboriosam excepturi consequatur nemo omnis aliquam labore atque in error veniam quas sunt dolore tenetur ullam quidem ut voluptatem eos nisi ratione! Ratione temporibus, quibusdam molestias quam voluptates aspernatur praesentium excepturi eius voluptatem aperiam modi sunt iure reprehenderit dolores!</p><br>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur ab explicabo optio nam quae fugiat, pariatur totam deleniti soluta fuga ad ratione enim, nesciunt repellat at id iusto illum.</p>
        </div>
        <div class="col50">
            <div class="imgBx">
                <img src="../../../public/assets/images/about.svg" alt="">
            </div>
        </div>
    </div>
</section>
<!-- end about section -->

<!-- product section  -->
<section class="menu" id="menu">
    <div class="title">
        <h2 class="titleText">Our <span>B</span>ooks</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. ?</p>
    </div>
    <div class="content">
        <div class="box">
            <div class="imgBx">
                <img src="../../../public/assets/images/about.svg" alt="">
            </div>
            <div class="text">
                <h3>Special Offer</h3>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                <img src="../../../public/assets/images/about.svg" alt="">
            </div>
            <div class="text">
                <h3>Special Offer</h3>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                <img src="../../../public/assets/images/about.svg" alt="">
            </div>
            <div class="text">
                <h3>Special Offer</h3>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                <img src="../../../public/assets/images/about.svg" alt="">
            </div>
            <div class="text">
                <h3>Special Offer</h3>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                <img src="../../../public/assets/images/about.svg" alt="">
            </div>
            <div class="text">
                <h3>Special Offer</h3>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                <img src="../../../public/assets/images/about.svg" alt="">
            </div>
            <div class="text">
                <h3>Special Offer</h3>
            </div>
        </div>
    </div>
    <div class="title">
        <a href="#" class="btnn">View All</a>
    </div>

</section>
<!-- end product section  -->

<script src="{{ asset('js/home.js')}}"></script>
</body>
</html>
