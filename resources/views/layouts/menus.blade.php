<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <!-- Logo -->
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('storage/public/'.$configs->logo)}}" alt="logo"></a>
                </div>
                <!--/ End Logo -->
                <div class="mobile-nav"></div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <!-- Header Widget -->
                <div class="header-widget">

                    <!-- Single Widget -->
                    <div class="single-widget">
                        <i class="fa fa-envelope"></i>
                        <h4>E-mail</h4>
                        <p><a href="mailto:faleconosco@hojeemcachoeira.com.br">faleconosco@hojeemcachoeira.com.br</a></p>
                    </div>
                    <!--/ End Single Widget -->
                    <!-- Single Widget -->
                    <div class="single-widget">
                        <i class="fa fa-phone"></i>
                        <h4>Fale Conosco</h4>
                        <p>+55 51 98954-1018</p>
                    </div>
                    <!--/ End Single Widget -->
                    <!-- Single Widget -->
                    <div class="single-widget">
                        <i class="fa fa-star"></i>
                        <h4>Anuncie Conosco</h4>
                        <a href="{{ route('home.register') }}"><span><i class="fa fa-plus"></i></span>Clique aqui</a>
                    </div>
                    <!--/ End Single Widget -->
                </div>
                <!--/ End Header Widget -->
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="nav-area">
                        <!-- Main Menu -->
                        <nav class="mainmenu">
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="{{ route('home.index') }}">Início</a></li>
                                     <li><a href="#">Categorias<i class="fa fa-angle-down"></i></a>
                                        <ul class="drop-down">
                                            @foreach ($categories as $category)
                                                <li><a href="{{ route('home.category', $category->slug) }}">{{ $category->name }}</a></li>
                                            @endforeach
                                         </ul>
                                    </li>

                                    <li><a href="{{ route('home.about') }}">Quem somos</a></li>
                                    <li><a href="{{ route('home.register') }}">Contato</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!--/ End Main Menu -->
                        <!-- Social -->
                        <ul class="social">
                            <li><a href="https://www.facebook.com/hojeemcachoeira" class="active"> <i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/hojeemcachoeira"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                        <!--/ End Social -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>