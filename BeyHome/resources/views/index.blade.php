<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <title>
        BeyHome
    </title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>

    @include('customLayouts.header')

    <!-- slider section -->
    <section class="slider_section">
        <div class="slider_container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Welcome To <br>
                                            BeyHome
                                        </h1>
                                        <p>
                                            "Welcome to BeyHome, your trusted platform for renting homes in Lebanon.
                                            We offer a diverse selection of properties, from cozy apartments to
                                            spacious villas, tailored to meet every lifestyle and budget. Whether
                                            you're searching for a serene mountain retreat or a vibrant city
                                            residence, BeyHome makes finding your ideal home seamless and
                                            hassle-free."
                                        </p>
                                        <a href="">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="img-box">
                                        <img src="images/slider-img.png" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Welcome To <br>
                                            BeyHome
                                        </h1>
                                        <p>
                                            "Welcome to BeyHome, your trusted platform for renting homes in Lebanon.
                                            We offer a diverse selection of properties, from cozy apartments to
                                            spacious villas, tailored to meet every lifestyle and budget. Whether
                                            you're searching for a serene mountain retreat or a vibrant city
                                            residence, BeyHome makes finding your ideal home seamless and
                                            hassle-free."
                                        </p>
                                        <a href="">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="img-box">
                                        <img src="images/slider-img.png" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Welcome To <br>
                                            BeyHome
                                        </h1>
                                        <p>
                                            "Welcome to BeyHome, your trusted platform for renting homes in Lebanon.
                                            We offer a diverse selection of properties, from cozy apartments to
                                            spacious villas, tailored to meet every lifestyle and budget. Whether
                                            you're searching for a serene mountain retreat or a vibrant city
                                            residence, BeyHome makes finding your ideal home seamless and
                                            hassle-free."
                                        </p>
                                        <a href="">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="img-box">
                                        <img src="images/slider-img.png" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel_btn-box">
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <img src="images/line.png" alt="" />
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end slider section -->


    <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div>
        @yield('content')
    </div>



    <!-- saving section -->

    {{-- <section class="saving_section ">
        <div class="box">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="img-box">
                            <img src="images/saving-img.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h2>
                                    Best Savings on <br>
                                    new arrivals
                                </h2>
                            </div>
                            <p>
                                Qui ex dolore at repellat, quia neque doloribus omnis adipisci, ipsum eos odio fugit ut
                                eveniet blanditiis praesentium totam non nostrum dignissimos nihil eius facere et eaque.
                                Qui, animi obcaecati.
                            </p>
                            <div class="btn-box">
                                <a href="#" class="btn1">
                                    Buy Now
                                </a>
                                <a href="#" class="btn2">
                                    See More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- end saving section -->

    <!-- why section -->
    @include('customLayouts.why-us')

    <!-- end why section -->


    <!-- gift section -->

    {{-- <section class="gift_section layout_padding-bottom">
        <div class="box ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <div class="img_container">
                            <div class="img-box">
                                <img src="images/gifts.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h2>
                                    Gifts for your <br>
                                    loved ones
                                </h2>
                            </div>
                            <p>
                                Omnis ex nam laudantium odit illum harum, excepturi accusamus at corrupti, velit
                                blanditiis unde perspiciatis, vitae minus culpa? Beatae at aut consequuntur porro
                                adipisci aliquam eaque iste ducimus expedita accusantium?
                            </p>
                            <div class="btn-box">
                                <a href="#" class="btn1">
                                    Buy Now
                                </a>
                                <a href="#" class="btn2">
                                    See More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <!-- end gift section -->


    <!-- contact section -->
    {{-- 
    <section class="contact_section ">
        <div class="container px-0">
            <div class="heading_container ">
                <h2 class="">
                    Contact Us
                </h2>
            </div>
        </div>
        <div class="container container-bg">
            <div class="row">
                <div class="col-lg-7 col-md-6 px-0">
                    <div class="map_container">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                                width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 px-0">
                    <form action="#">
                        <div>
                            <input type="text" placeholder="Name" />
                        </div>
                        <div>
                            <input type="email" placeholder="Email" />
                        </div>
                        <div>
                            <input type="text" placeholder="Phone" />
                        </div>
                        <div>
                            <input type="text" class="message-box" placeholder="Message" />
                        </div>
                        <div class="d-flex ">
                            <button>
                                SEND
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- end contact section -->

    <!-- client section -->
    <section class="client_section layout_padding" style="padding-top: 0">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Testimonial
                </h2>
            </div>
        </div>
        <div class="container px-0">
            <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="box">
                            <div class="client_info">
                                <div class="client_name">
                                    <h5 style="color: black">
                                        Morijorch
                                    </h5>
                                    <h6>
                                        Default model text
                                    </h6>
                                </div>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <p>
                                editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'
                                will uncover many web sites still in their infancy. Variouseditors now use Lorem Ipsum
                                as their default model text, and a search for 'lorem ipsum' will uncover many web sites
                                still in their infancy. Variouseditors now use Lorem Ipsum as their default model text,
                                and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                                Various
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="box">
                            <div class="client_info">
                                <div class="client_name">
                                    <h5 style="color: black">
                                        Rochak
                                    </h5>
                                    <h6>
                                        Default model text
                                    </h6>
                                </div>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <p>
                                Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem
                                ipsum' will uncover many web sites still in their infancy. Variouseditors now use Lorem
                                Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web
                                sites still in their infancy. editors now use Lorem Ipsum as their default model text,
                                and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="box">
                            <div class="client_info">
                                <div class="client_name">
                                    <h5 style="color: black">
                                        Brad Johns
                                    </h5>
                                    <h6>
                                        Default model text
                                    </h6>
                                </div>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <p>
                                Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem
                                ipsum' will uncover many web sites still in their infancy, editors now use Lorem Ipsum
                                as their default model text, and a search for 'lorem ipsum' will uncover many web sites
                                still in their infancy. Variouseditors now use Lorem Ipsum as their default model text,
                                and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                                Various
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel_btn-box">
                    <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end client section -->


    @include('customLayouts.footer')


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
