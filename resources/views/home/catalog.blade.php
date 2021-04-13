@extends('layouts.site.app')
@section('title', $catalog->client->name)
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


    <!--================= PAGE-COVER ================-->
    <section class="page-cover" id="topo-itens">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <img src="{{ asset('storage/public/'.$catalog->client->contracts->file) }}" class="img-rounded img-responsive">
                </div>
                <div class="col-sm-6">
                    <h1 class="page-title">{{ $catalog->client->name }}</h1>
                    <h4>{{ $catalog->client->address }} / Cachoeira do Sul - RS </h4>
                    <h4><i class="fa fa-whatsapp"></i>&ensp;{{ $catalog->client->phone }}</h4>
                    @isset($catalog->client->phone_comercial)
                        <h4><i class="fa fa-phone"></i>&ensp;{{ $catalog->client->phone_comercial }}</h4>
                    @endisset
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home.index') }}">Inicio</a></li>
                        @isset($catalog->client->contracts->category)
                            <li class="active">{{ $catalog->client->contracts->category->name }}</li>
                        @endisset
                    </ul>
                    <br><br>
                </div><!-- end columns -->
                <div class="col-sm-4">
                    <h1 class="page-title">Redes sociais</h1>
                    <div class="row">
                        <div class="col-md-12 ">
                            <ul class="social-network social-circle ">
                                <li><a href="{{$catalog->client->facebook}}" class="icoFacebook" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
                                <li><a href="#" class="icoGoogle" title="E-mail"><i class="fa fa-envelope fa-1x"></i></a></li>
                                <li><a href="{{$catalog->client->instagram}}" class="icoLinkedin" title="Instagram"><i class="fa fa-instagram fa-1x"></i></a></li>
                                <li><a href="https://api.whatsapp.com/send?phone=+55{{ preg_replace('/[^\dxX]/', '', $catalog->client->phone) }}&amp;text=Oi, quero mais informações." class="icoLinkedin" title="WhatsApp"><i class="fa fa-whatsapp fa-1x"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->



    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="hotel-details" class="">
            <div class="container">

                <div class="card">
                    <div class="row">
                        <div class="col-sm-12">
                           <br><Br>
                        </div>
                    </div>


                </div><!-- end detail-tabs -->


                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 content-side">

                        <div class="detail-slider">
                            <div class="feature-slider">
                                @foreach ($catalog->attachments()->get() as $photo)
                                    <div><img src="{{asset('storage/public/'.$photo->path)}}" class="img-responsive" alt="feature-img"/></div>
                                @endforeach
                            </div><!-- end feature-slider -->

                            <div class="feature-slider-nav">
                                @foreach ($catalog->attachments()->get() as $photo)
                                    <div><img src="{{asset('storage/public/'.$photo->path)}}"  class="img-responsive" alt="feature-thumb" style="height: 144px!important;"/></div>
                                @endforeach
                            </div><!-- end feature-slider-nav -->
                            <br><br>
                        </div>  <!-- end detail-slider -->
                    </div><!-- end columns -->
                    <div class="col-sm-4">
                        <h4>{{ $catalog->name }}</h4>
                        {!! $catalog->description !!}
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end hotel-details -->
    </section><!-- end innerpage-wrapper -->

    <a href="https://api.whatsapp.com/send?phone=55{{ preg_replace('/[^\dxX]/', '', $catalog->client->phone) }}&amp;text=Oi, quero mais informações." target="_blank" class="btn-whats text-white">
        <span>
            <i class="fa fa-whatsapp fa-2x"></i>
        </span>
        Fale com a gente
    </a>

    @push('script')
        <script src="{{asset('js/slick.min.js')}}"></script>
        <script src="{{asset('js/custom-slick.js')}}"></script>
    @endpush
@endsection



