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
    @include('customLayouts.filter')

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


    <div>
        @yield('content')
    </div>


    @include('customLayouts.why-us')

    @include('testimonial')


    <footer> @include('customLayouts.footer')</footer>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
