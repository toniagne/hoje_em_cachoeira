<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- Meta tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="SITE KEYWORDS HERE" />
    <meta name="description" content="">
    <meta name='copyright' content='codeglim'>

    <!-- Title Tag -->
    <title>{{ $configs->title }} | @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css')}}">

    <!-- Tromas CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/theme-plugins.css')}}">
    <link rel="stylesheet" href="{{ asset('home/style.css')}}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css')}}">

    <!-- Tromas Color -->
    <link rel="stylesheet" href="{{ asset('home/css/skin/skin1.css') }}">
    <!--<link rel="stylesheet" href="css/skin/skin2.css">-->
    <!--<link rel="stylesheet" href="css/skin/skin3.css">-->
    <!--<link rel="stylesheet" href="css/skin/skin4.css">-->
    <!--<link rel="stylesheet" href="css/skin/skin5.css">-->
    <!--<link rel="stylesheet" href="css/skin/skin6.css">-->
    <!--<link rel="stylesheet" href="css/skin/skin7.css">-->
    <!--<link rel="stylesheet" href="css/skin/skin8.css">-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="#" id="tromas">
</head>
<body id="bg" style="">
<div id="layout" class="">

    <!-- Start Header -->
    @include('layouts.menus')
    <!--/ End Header -->

    @yield('content')


    <!-- Start Footer -->
    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- Address Widget -->
                        <div class="single-widget address">
                            <h2>Contatos</h2>
                             <ul class="list">
                                <li><i class="fa fa-whatsapp"></i>Telefone:  +55 51 98954-1018 </li>
                                <li><i class="fa fa-envelope"></i>Email:<a href="mailto:faleconosco@hojeemcachoeira.com.br">faleconosco@hojeemcachoeira.com.br</a></li>

                            </ul>
                            <ul class="social">
                                <li><a href="https://www.facebook.com/hojeemcachoeira"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/hojeemcachoeira/"><i class="fa fa-instagram"></i></a></li>

                            </ul>
                        </div>
                        <!--/ End Address Widget -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- Links Widget -->
                        <div class="single-widget links">
                            <h2>Previsão do tempo</h2>
                            <!-- Widget Previs&atilde;o de Tempo CPTEC/INPE --><iframe allowtransparency="true" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="https://www.cptec.inpe.br/widget/widget.php?p=1078&w=h&c=909090&f=ffffff" height="200px" width="215px"></iframe><noscript>Previs&atilde;o de <a href="http://www.cptec.inpe.br/cidades/tempo/1078">Cachoeira do Sul/RS</a> oferecido por <a href="http://www.cptec.inpe.br">CPTEC/INPE</a></noscript><!-- Widget Previs&atilde;o de Tempo CPTEC/INPE -->

                        </div>
                        <!--/ End Links Widget -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- Twitter Widget -->
                        <div class="single-widget twitter">
                            <h2>Apopio</h2>
                            <a href="https://www.unicred.com.br/" target="_blank">
                                <svg _ngcontent-serverApp-c1="" xml:space="preserve" style="enable-background:new 0 0 268 40;" viewBox="0 0 268 40" x="0px" y="0px"><g _ngcontent-serverApp-c1=""><polygon _ngcontent-serverApp-c1="" class="letter-green" points="60.6,5.6 60.6,30.5 40.4,5.6 35.1,5.6 35.1,39.6 40.6,39.6 40.6,14.7 60.8,39.6 66.4,39.6    66.4,5.6  " style="fill:#004A35;"></polygon><rect _ngcontent-serverApp-c1="" class="letter-green" height="34" style="fill:#004A35;" width="7.1" x="72.7" y="5.6"></rect><path _ngcontent-serverApp-c1="" d="M267.9,24.9L254,1l-0.1-0.2c0,0,0,0,0,0C253.5,0.3,253,0,252.4,0c0,0-0.1,0-0.1,0c0,0-0.1,0-0.1,0   h-17.5h0c0,0-0.1,0-0.1,0h0c-0.1,0-0.1,0-0.2,0h0c0,0-0.1,0-0.1,0c0,0-0.1,0-0.1,0c0,0,0,0,0,0c-0.4,0.1-0.7,0.4-1.1,0.8   l-22.3,23.9c0,0-0.1,0-0.1,0.1c0,0-0.1,0.1-0.1,0.1c-0.1,0.1-0.1,0.3-0.1,0.5c0,0.5,0.4,0.8,0.8,0.9h0c0,0,10.6,0,10.6,0   c0.2,0,0.3,0.1,0.3,0.3c0,0.1,0,0.1-0.1,0.2v0c0,0,0,0,0,0l-10.7,11.4c0,0-0.1,0.1-0.1,0.1c-0.1,0.1-0.1,0.2-0.2,0.3   c0,0.1,0,0.2,0,0.2c0,0.2,0.1,0.4,0.3,0.6c0.1,0.1,0.3,0.1,0.5,0.2c0,0,0.1,0,0.1,0h7.2h0c0.4,0,0.9-0.2,1.2-0.5c0,0,0,0,0,0   L231.7,27c0.1-0.1,0.1-0.1,0.1-0.2c0-0.2-0.1-0.3-0.3-0.3c0,0-6.1,0-6.1,0c-0.2,0-0.3-0.2-0.3-0.3c0-0.1,0-0.1,0.1-0.2v0l11.9-12.7   c0,0,0.1-0.1,0.1-0.1c0.2-0.2,0.4-0.3,0.6-0.3c0.3,0,0.5,0.1,0.7,0.4c0,0,6.7,11.6,6.7,11.6l0.7,1.2c0,0,0,0,0,0l0,0.1h0   c0,0,0,0.1,0,0.1c0,0.2-0.1,0.3-0.3,0.3c0,0-6.2,0-6.2,0c-0.2,0-0.4,0.2-0.4,0.4c0,0.1,0,0.2,0.1,0.3l6.7,11.6l0,0.1   c0.3,0.5,0.8,0.8,1.3,0.8h0.3h13.8h0c0.2,0,0.3,0,0.5-0.1c0.4-0.2,0.6-0.5,0.6-0.9c0-0.1,0-0.3-0.1-0.4l-0.1-0.2l-6.5-11.2   c0,0,0-0.1,0-0.1h0l0,0c0-0.2,0.1-0.3,0.3-0.3c0,0,0,0,0.1,0h11h0h0h0.1c0.1,0,0.2,0,0.3,0c0,0,0,0,0,0c0,0,0.1,0,0.1,0   c0,0,0,0,0,0h0c0,0,0,0,0,0c0,0,0.1,0,0.1-0.1c0,0,0,0,0,0c0,0,0.1-0.1,0.1-0.1c0,0,0,0,0,0c0,0,0-0.1,0.1-0.1c0,0,0-0.1,0.1-0.1   c0,0,0-0.1,0.1-0.1c0,0,0-0.1,0-0.1C268.1,25.6,268.1,25.3,267.9,24.9 M246.4,12.2L246.4,12.2C246.4,12.2,246.4,12.2,246.4,12.2   l-16.9,0c0,0,0,0,0,0c-0.2,0-0.3-0.2-0.3-0.3c0-0.1,0-0.2,0.1-0.2l0,0L239.3,1c0.1-0.1,0.2-0.1,0.3-0.2c0.1-0.1,0.3-0.2,0.5-0.2   c0,0,0,0,0,0c0,0,0,0,0.1,0c0.2,0,0.5,0.2,0.6,0.4c0,0,6.1,10.6,6.1,10.6c0,0,0,0,0,0c0,0.1,0.1,0.1,0.1,0.2   C246.8,12,246.6,12.2,246.4,12.2" style="fill:#B9A557;"></path><polygon _ngcontent-serverApp-c1="" points="171.4,5.6 152.7,5.6 146.4,39.6 166.9,39.6 167.9,33.8 156.7,33.8 158.4,24.7 167.5,24.7    168.6,18.9 159.5,18.9 160.9,11.4 170.3,11.4  " style="fill:#B9A557;"></polygon><path _ngcontent-serverApp-c1="" d="M189.1,5.6h-11.9l-6.4,34h11.6c11.2,0,20.8-7.5,20.8-19.7C203.2,11.4,198.3,5.6,189.1,5.6    M183.6,33.8h-2.4l4.2-22.4h2.5c3.7,0,5.9,4.2,5.9,8.6C193.7,29,187.9,33.8,183.6,33.8" style="fill:#B9A557;"></path><path _ngcontent-serverApp-c1="" d="M101.4,33.8c-3.7,0-5.9-4.2-5.9-8.6c0-9,5.9-13.8,10.1-13.8h11.5l1.1-5.8h-11.4   c-11.2,0-20.8,7.5-20.8,19.7c0,8.4,4.9,14.3,14.1,14.3H112l1.1-5.8L101.4,33.8z" style="fill:#B9A557;"></path><path _ngcontent-serverApp-c1="" d="M138.3,24.5c3.2-1.6,7.2-4.3,7.2-10.2c0-3.6-2.4-8.6-9.6-8.6h-13.7l-6.4,34h9.2l2.4-12.9h2.6   l3.5,12.9h10.1L138.3,24.5z M131.3,20.9h-2.8l1.9-9.6h2.4c2,0,3.6,2,3.6,4C136.4,18.5,133.8,20.9,131.3,20.9" style="fill:#B9A557;"></path><path _ngcontent-serverApp-c1="" class="letter-green" d="M21.8,5.6v18.6c-0.2,7.6-1.6,12-7.3,12h-0.1c-5.7,0-7.2-4.4-7.3-12V5.6H0v20.8   c0,7.4,2.7,11.8,9,13.2c0,0,1.8,0.4,4.9,0.4h1c3.1,0,4.6-0.4,4.6-0.4c6.6-1.3,9.3-5.9,9.3-13.2V5.6H21.8z" style="fill:#004A35;"></path></g></svg>
                            </a>
                        </div>
                        <!--/ End Twitter Widget -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- Gallery Widget -->
                        <div class="single-widget photo-gallery ">
                            <h2>Quem somos</h2>
                            <p class="text-uppercase">{!! $configs->release !!}</p>
                        </div>
                        <!--/ End Gallery Widget -->
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- copyright -->
                        <div class="copyright">
                            <p>&copy; {{ now('Y') }}  Hoje em Cachoeira. Todos os direitos reservados.
                                <a href="{{ route('home.terms') }}">Termos de serviço</a> |
                                <a href="{{ route('home.policies') }}">Política de privacidade</a> </p>
                        </div>
                        <!--/ End Copyright -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ End footer -->

    <!-- Jquery -->
    <script src="{{ asset('home/js/jquery.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('home/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- Modernizer JS -->
    <script src="{{ asset('home/js/modernizr.min.js') }}" type="text/javascript"></script>
    <!-- Tromas JS -->
    <script src="{{ asset('home/js/tromas.js') }}" type="text/javascript"></script>
    <!-- Tromas Plugins -->
    <script src="{{ asset('home/js/theme-plugins.js') }}" type="text/javascript"></script>
    <!-- Google Map JS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM" type="text/javascript"></script>
    <script src="{{ asset('home/js/gmap.min.js') }}"  type="text/javascript" ></script>
    <!-- Main JS -->
    <script src="{{ asset('home/js/main.js') }}" type="text/javascript"></script>
</div>
</body>
</html>