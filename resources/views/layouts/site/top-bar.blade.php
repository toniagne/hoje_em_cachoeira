<!--============= TOP-BAR ===========-->
<div id="top-bar" class="tb-text-white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div id="info">
                    <ul class="list-unstyled list-inline">

                        <li><span><i class="fa fa-phone"></i></span>+55 51 98954-1018</li>
                    </ul>
                </div><!-- end info -->
            </div><!-- end columns -->

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div id="links">
                    <ul class="list-unstyled list-inline">
                        <li><a href="{{ route('admin.dash') }}"><span><i class="fa fa-lock"></i></span>Area do cliente</a></li>
                        <li><a href="{{ route('home.register') }}"><span><i class="fa fa-plus"></i></span>Anuncie Aqui</a></li>

                    </ul>
                </div><!-- end links -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end top-bar -->

<nav class="navbar navbar-default main-navbar navbar-custom navbar-white" id="mynavbar-1">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" id="menu-button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="header-search hidden-lg">

            </div>
            <a href="{{ route('home.index') }}" class="navbar-brand" style="height:80px!important;">
                <img class="img-bordered-sm img-fluid "
                     src="{{ asset('storage/public/'.$configs->logo)}}"
                     height="50px"
                     alt="{{ $configs->title }}">
            </a>
        </div><!-- end navbar-header -->

        <div class="collapse navbar-collapse" id="myNavbar1">
            <ul class="nav navbar-nav navbar-right navbar-search-link">
                <li class="active">
                    <a href="{{ route('home.index') }}" >Inicio</a>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias<span><i class="fa fa-angle-down"></i></span></a>

                    <ul class="dropdown-menu mega-dropdown-menu row ">
                        <li>
                            <div class="row">
                                <div class="container">
                                    <ul class="columns">
                                        @foreach ($categories as $category)
                                            <li><a href="{{ route('home.category', $category->slug) }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <li class="dropdown ">
                    <a href="{{ route('home.about') }}" class="dropdown-toggle">Quem Somos</a>

                </li>
                <li class="dropdown ">
                    <a href="{{ route('home.projects') }}" class="dropdown-toggle">Projetos</a>

                </li>
                <li> </li>
            </ul>
        </div><!-- end navbar collapse -->
    </div><!-- end container -->
</nav><!-- end navbar -->

@include('components.mobile-menu')
