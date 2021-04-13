@extends('layouts.site.app')
@section('title', $project->name)
@section('content')
    @push('style')
        <!-- Slick Stylesheet -->
        <link rel="stylesheet" href="{{asset('css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
        <style>
            .text-branco{
                color: #ffffff!important;
            }

            ul.social-network {
                list-style: none;
                display: inline;
                margin-left:0 !important;
                padding: 0;
            }
            ul.social-network li {
                display: inline;
                margin: 0 5px;
            }


            /* footer social icons */
            .social-network a.icoRss:hover {
                background-color: #F56505;
            }
            .social-network a.icoFacebook:hover {
                background-color:#3B5998;
            }
            .social-network a.icoTwitter:hover {
                background-color:#33ccff;
            }
            .social-network a.icoGoogle:hover {
                background-color:#BD3518;
            }
            .social-network a.icoVimeo:hover {
                background-color:#0590B8;
            }
            .social-network a.icoLinkedin:hover {
                background-color:#007bb7;
            }
            .social-network a.icoRss:hover i, .social-network a.icoFacebook:hover i, .social-network a.icoTwitter:hover i,
            .social-network a.icoGoogle:hover i, .social-network a.icoVimeo:hover i, .social-network a.icoLinkedin:hover i {
                color:#fff;
            }
            a.socialIcon:hover, .socialHoverClass {
                color:#44BCDD;
            }

            .social-circle li a {
                display:inline-block;
                position:relative;
                margin:0 auto 0 auto;
                -moz-border-radius:50%;
                -webkit-border-radius:50%;
                border-radius:50%;
                text-align:center;
                width: 50px;
                height: 50px;
                font-size:20px;
            }
            .social-circle li i {
                margin:0;
                line-height:50px;
                text-align: center;
            }

            .social-circle li a:hover i, .triggeredHover {
                -moz-transform: rotate(360deg);
                -webkit-transform: rotate(360deg);
                -ms--transform: rotate(360deg);
                transform: rotate(360deg);
                -webkit-transition: all 0.2s;
                -moz-transition: all 0.2s;
                -o-transition: all 0.2s;
                -ms-transition: all 0.2s;
                transition: all 0.2s;
            }
            .social-circle i {
                color: #fff;
                -webkit-transition: all 0.8s;
                -moz-transition: all 0.8s;
                -o-transition: all 0.8s;
                -ms-transition: all 0.8s;
                transition: all 0.8s;
            }
            .btn-whats {
                display: flex;
                align-items: center;
                position: fixed;
                bottom: 12px;
                right: 12px;
                background-color: #44b75a;
                color: #fff;
                font-size: 13px;
                line-height: 3em;
                border-radius: 5px;
                padding-right: 1.2em;
                transition: background-color 0.2s;
                overflow: hidden;
                z-index: 900;
            }

            .btn-whats span {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 3em;
                height: 3em;
                margin-right: 1em;
                background-color: #48D162;
                transition: background-color 0.2s;
            }

            .btn-whats svg {
                width: 1.4em;
                height: 1.4em;
                fill: currentColor;
            }

            .btn-whats:hover {
                background-color: #3da451;
            }

            .btn-whats:hover span {
                background-color: #34cc51;
            }
            .btn-whats:hover {
                background-color: #34cc51;
            }
            .btn-whats:active span {
                background-color: #34cc51;
            }
        </style>
    @endpush


    <section class="page-cover" id="topo-search">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <img src="{{ asset('storage/public/'.$project->file) }}" class="img-rounded img-responsive">
                </div>
                <div class="col-sm-6">
                    <h1 class="page-title">{{ $project->name }}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home.index') }}">Inicio</a></li>
                        <li class="active">{{ $project->name }}</li>
                    </ul>
                    <br><br>
                </div><!-- end columns -->

            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->


    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="hotel-details" class="">
            <div class="container">

                <div class="detail-tabs">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#quem-somos" data-toggle="tab">Detalhes</a></li>
                    </ul>

                    <div class="tab-content">

                        <div id="quem-somos" class="tab-pane in active">
                            <div class="row">
                                <div class="col-sm-4 col-md-4 tab-img">
                                    <img src="{{ asset('storage/public/'.$project->file) }}" class="img-responsive" alt="{{ $project->name }}" />
                                </div><!-- end columns -->

                                <div class="col-sm-8 col-md-8 tab-text">
                                    <p>{!! $project->description !!}</p>
                                </div><!-- end columns -->
                            </div><!-- end row -->
                        </div>


                    </div><!-- end tab-content -->
                </div><!-- end detail-tabs -->

                <div class="row">





                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end hotel-details -->
    </section><!-- end innerpage-wrapper -->


    @push('script')
        <script src="{{asset('js/slick.min.js')}}"></script>
        <script src="{{asset('js/custom-slick.js')}}"></script>
    @endpush
@endsection



