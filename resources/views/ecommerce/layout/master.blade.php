<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hoje em Cachoeira - E-commerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('ecommerce/css/bootstrap.min.css') }}">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="{{ asset('ecommerce/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/css/owl.theme.default.min.css') }}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ asset('ecommerce/css/core.css') }}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ asset('ecommerce/css/shortcode/shortcodes.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('ecommerce/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('ecommerce/css/responsive.css') }}">
    <!-- User style -->
    <link rel="stylesheet" href="{{ asset('ecommerce/css/custom.css') }}">


    <!-- Modernizr JS -->
    <script src="{{ asset('ecommerce/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Body main wrapper start -->
<div class="wrapper fixed__footer">
    <!-- Start Header Style -->
    <header id="header" class="htc-header header--3 bg__white">
        <!-- Start Mainmenu Area -->
        <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-2 col-sm-3 col-xs-3">
                        <div>
                            <a href="{{ route('home.index') }}" class="navbar-brand">
                                <img
                                     src="{{ asset('storage/public/'.$configs->logo)}}"
                                     style="width: 150px!important;"
                                     alt="{{ $configs->title }}">
                            </a>
                        </div>
                    </div>
                    <!-- Start MAinmenu Ares -->
                    <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                        @include('ecommerce.layout.menu')
                    </div>
                    <!-- End MAinmenu Ares -->
                    <div class="col-md-2 col-sm-4 col-xs-3">
                        <ul class="menu-extra">
                           <li class="cart__menu"><span class="ti-shopping-cart"></span> ({{ $cart_items ? $cart_items->totalQty : 0 }})</li>
                        </ul>
                    </div>
                </div>
                <div class="mobile-menu-area"></div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>
    <!-- End Header Style -->
    <div class="body__overlay"></div>
    <!-- Start Offset Wrapper -->
    <div class="offset__wrapper">


        <!-- Start Cart Panel -->
        @include('ecommerce.layout.shopping_cart')
        <!-- End Cart Panel -->
    </div>
    <!-- End Offset Wrapper -->
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{asset('storage/public/'.$client->ecommerce_image)}}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Our Product Area -->
    <section class="htc__product__area shop__page ptb--30 bg__white">
        <div class="container">
            <div class="htc__product__container">
                @yield('layout')
            </div>
        </div>
    </section>
    <!-- End Our Product Area -->
    <!-- Start Footer Area -->
    <footer class="htc__foooter__area gray-bg">
        <div class="container">
            <!-- Start Copyright Area -->
            <div class="htc__copyright__area">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="copyright__inner">
                            <div class="copyright">
                                <p>© {{ now()->format('Y') }} <a href="https://hojeemcachoeira.com.br/">Hoje em Cachoeira</a>
                                    Todos os direitos reservados.</p>
                            </div>
                            <ul class="footer__menu">
                                <li><a href="{{ route('home.index') }}">Início</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </div>
    </footer>
    <!-- End Footer Area -->
</div>
<!-- Body main wrapper end -->
<!-- QUICKVIEW PRODUCT -->

<!-- END QUICKVIEW PRODUCT -->
<!-- Placed js at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="{{ asset('ecommerce/js/vendor/jquery-1.12.0.min.js') }}"></script>
<!-- Bootstrap framework js -->
<script src="{{ asset('ecommerce/js/bootstrap.min.js') }}"></script>
<!-- All js plugins included in this file. -->
<script src="{{ asset('ecommerce/js/plugins.js') }}"></script>
<script src="{{ asset('ecommerce/js/slick.min.js') }}"></script>
<script src="{{ asset('ecommerce/js/owl.carousel.min.js') }}"></script>
<!-- Waypoints.min.js. -->
<script src="{{ asset('ecommerce/js/waypoints.min.js') }}"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="{{ asset('ecommerce/js/main.js') }}"></script>

<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items: 1,
            dots: true,
            dotsEach: true,
            autoplay:true
        });
    });
</script>
</body>

</html>