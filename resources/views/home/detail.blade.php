@extends('layouts.site.app')
@section('title', $client->name)
@section('content')
    @push('style')

        <meta property="og:url"           content="{{url()->current()}}" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="{{ $client->name }}" />
        <meta property="og:description"   content="{{ $client->address }} / Cachoeira do Sul - RS  / {{ $client->phone }}"  />
        <meta property="og:image"         content="{{ asset('storage/public/'.$client->contracts->file) }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
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

            .lightbox-gallery {
                color: #000;
                overflow-x: hidden
            }

            .lightbox-gallery p {
                color: #fff
            }

            .lightbox-gallery h2 {
                font-weight: bold;
                margin-bottom: 40px;
                padding-top: 40px;
                color: #fff
            }

            @media (max-width:767px) {
                .lightbox-gallery h2 {
                    margin-bottom: 25px;
                    padding-top: 25px;
                    font-size: 24px
                }
            }

            .lightbox-gallery .intro {
                font-size: 16px;
                max-width: 500px;
                margin: 0 auto 40px
            }

            .lightbox-gallery .intro p {
                margin-bottom: 0
            }

            .lightbox-gallery .photos {
                padding-bottom: 20px
            }


            .lightbox-gallery .item {
                padding-bottom: 30px
            }
            .gallery-image {
                display: block;
                max-width: 100%;
                height: auto;
            }

            .center-cropped {
                object-fit: cover;
                object-position: center; /* Center the image within the element */
                height: 100px;
                width: 100%;
            }

            .album-thumbnails a {
                /* set the desired width/height and margin here */
                width: 100%;
                height: 150px;

                position: relative;
                overflow: hidden;
                display: inline-block;
            }
            .album-thumbnails a img {
                position: absolute;
                left: 50%;
                top: 50%;
                height: 100%;
                width: auto;
                -webkit-transform: translate(-50%,-50%);
                -ms-transform: translate(-50%,-50%);
                transform: translate(-50%,-50%);
            }
            .album-thumbnails a img.portrait {
                width: 100%;
                height: auto;
            }

        </style>
    @endpush

    @if ($client->catalog)
    <div class="overlay">
        <a href="javascript:void(0)" id="close-button" class="closebtn">&times;</a>
        <div class="overlay-content">

            <div id="team" class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-heading">
                                <h3 class="text-white">Nosso catálogo de produtos</h3>
                                <hr class="heading-line" />
                            </div><!-- end page-heading -->

                            <div class="owl-carousel owl-theme" id="owl-team">
                                @foreach ($client->catalog->attachments()->get() as $catalog)
                                <div class="item">
                                    <div class="member-block">
                                        <div class="member-img">
                                            <img src="{{ asset('storage/public/'.$catalog->path) }}" class="img-responsive img-circle" alt="member-img" />

                                        </div><!-- end member-img -->

                                        <div class="member-name">
                                            <p> </p>
                                        </div><!-- end member-name -->
                                    </div><!-- end member-block -->
                                </div><!-- end item -->
                                @endforeach
                            </div><!-- end owl-team -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end team -->
        </div><!-- end overlay-content -->
    </div><!-- end overlay -->
    @endif

<!--================= PAGE-COVER ================-->
<section class="page-cover" id="topo-itens">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <img src="{{ asset('storage/public/'.$client->contracts->file) }}" class="img-rounded img-responsive">
            </div>
            <div class="col-sm-6">
                <h1 class="page-title">{{ $client->name }}</h1>
                <h4>{{ $client->address }} / Cachoeira do Sul - RS </h4>
                <h4><i class="fa fa-whatsapp"></i>&ensp;{{ $client->phone }}</h4>
                @isset($client->phone_comercial)
                    <h4><i class="fa fa-phone"></i>&ensp;{{ $client->phone_comercial }}</h4>
                @endisset
                <ul class="breadcrumb">
                    <li><a href="{{ route('home.index') }}">Inicio</a></li>
                    @isset($client->contracts->category)
                    <li class="active">{{ $client->contracts->category->name }}</li>
                        @endisset
                </ul>
                <br><br>
            </div><!-- end columns -->
            <div class="col-sm-4">
                <h1 class="page-title">Redes sociais</h1>
                <div class="row">
                    <div class="col-md-12 ">
                        <ul class="social-network social-circle ">
                            <li><a href="{{$client->facebook}}" class="icoFacebook" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="E-mail"><i class="fa fa-envelope fa-1x"></i></a></li>
                            <li><a href="{{$client->instagram}}" class="icoLinkedin" title="Instagram"><i class="fa fa-instagram fa-1x"></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?phone=+55{{ preg_replace('/[^\dxX]/', '', $client->phone) }}&amp;text=Oi, quero mais informações." class="icoLinkedin" title="WhatsApp"><i class="fa fa-whatsapp fa-1x"></i></a></li>
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

            @if($client->promotions($client->id) )

               <div class="modal fade" id="competitorInscription" tabindex="-1" role="dialog" aria-labelledby="competitorInscription" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLabel">PARTICIPAR DA PROMOÇÃO - {{$client->promotions($client->id)->name}}</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                           <div class="modal-body">
                               {!! $client->promotions($client->id)->description !!}
                               <form method="post" action="{{ route('home.participate.promotion', $client->id ) }}" enctype="multipart/form-data">
                                   @csrf

                                   <input type="hidden" name="raffle_id" value="{{$client->promotions($client->id)->id}}">

                                   <div class="box-body">
                                       <div class="form-group">
                                           <label for="name">Nome completo</label>
                                           <input type="text" required class="form-control" id="name" name="name"  placeholder="Nome do cliente">
                                       </div>

                                       <div class="form-group">
                                           <label for="name">Telefone/WhatsApp</label>
                                           <input type="text" required class="form-control phone" id="name" name="phone"  placeholder="Telefone / WhatsApp">
                                       </div>

                                       <input type="submit" class="btn btn-block btn-success" value="CADASTRAR">
                           </div>
                               </form>
                            </div>
                        </div>
                 </div>
               </div>
            @endif

                @if($client->promotions($client->id) )
                    @if(session('message'))
                        <div class="alert alert-success" role="alert">
                            {{session('message')}}
                        </div>

                    @endif
                    <br><br>
                    <a data-toggle="modal" data-target="#competitorInscription">
                        <img src="{{asset('storage/public/'.$client->promotions($client->id)->attachments()->get()[0]->path )}}"  width="100%">
                    </a>
                    <br><br>
                    <!-- Modal -->
                    <br><br>
                @endif

            <div class="detail-tabs">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#quem-somos" data-toggle="tab">Quem somos</a></li>
                    @isset($client->services)<li><a href="#servicos" data-toggle="tab">Serviços</a></li>@endisset
                    <li><a href="#contatos" data-toggle="tab">Contatos</a></li>
                </ul>

                <div class="tab-content">

                    <div id="quem-somos" class="tab-pane in active">
                        <div class="row">
                            <div class="col-sm-4 col-md-4 tab-img">
                                <img src="{{ asset('storage/public/'.$client->file) }}" class="img-responsive" alt="{{ $client->name }}" />
                            </div><!-- end columns -->

                            <div class="col-sm-8 col-md-8 tab-text">
                                <h3>Sobre {{ $client->name }}</h3>
                                <p>{!! $client->release !!}</p>
                            </div><!-- end columns -->
                        </div><!-- end row -->
                    </div>

                    <div id="servicos" class="tab-pane">
                        <div class="row">
                            <div class="col-sm-4 col-md-4 tab-img">
                                <img src="{{ asset('storage/public/'.$client->file) }}" class="img-responsive" alt="{{ $client->name }}" />
                            </div><!-- end columns -->

                            <div class="col-sm-8 col-md-8 tab-text">
                                <h3>Serviços</h3>
                                <p>{!! $client->services !!}</p>
                            </div><!-- end columns -->
                        </div><!-- end row -->
                    </div>

                    <div id="contatos" class="tab-pane">
                        <div class="row">
                            <div class="col-sm-4 col-md-4 tab-img">
                                <img src="{{ asset('storage/public/'.$client->file) }}" class="img-responsive" alt="{{ $client->name }}" />
                            </div><!-- end columns -->

                            <div class="col-sm-8 col-md-8 tab-text">
                                <h3>Contatos</h3>
                                <p> Fone/Whats: <a href="https://api.whatsapp.com/send?phone=55{{ preg_replace('/[^\dxX]/', '', $client->phone) }}&amp;text=Oi, quero mais informações." target="_blank">{{ $client->phone }}</a>  </p>
                                @isset($client->phone_comercial)<p> Fone: <a href="tel:{{$client->phone_comercial}}">{{ $client->phone_comercial }}</a>  </p> @endisset
                                <p> Endereço: {{ $client->address }} / Cachoeira do Sul - RS  </p>
                                <p> E-mail: <a href="mailto:{{ $client->email }}"> {{ $client->email }}</a>  </p>
                            </div><!-- end columns -->
                        </div><!-- end row -->
                    </div>

                </div><!-- end tab-content -->
            </div><!-- end detail-tabs -->



            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-side">

                    <div class="lightbox-gallery">
                            <div class="row photos">
                                @foreach ($client->attachments()->get() as $photo)
                                <div class="col-sm-6 col-md-4 col-lg-3 item album-thumbnails"><a href="{{asset('storage/public/'.$photo->path)}}" data-lightbox="photos" ><img src="{{asset('storage/public/'.$photo->path)}}"></a></div>
                                @endforeach
                            </div>
                        </div>
                    </div>




                </div><!-- end columns -->
            </div><!-- end row -->
            @if($client->contracts()->first()->advertsement_id == 10)

            <a href="{{ route('home.catalogs', $client->slug) }}">
                <img src="{{ asset('/public/images/banner-catalogo-hoje.jpeg') }}" class="img-responsive" width="100%" alt="{{ $client->name }}" />
            </a>
            @endif
                <br>
        </div><!-- end container -->
    </div><!-- end hotel-details -->
</section><!-- end innerpage-wrapper -->

    <a href="https://api.whatsapp.com/send?phone=55{{ preg_replace('/[^\dxX]/', '', $client->phone) }}&amp;text=Oi, quero mais informações." target="_blank" class="btn-whats text-white">
        <span>
            <i class="fa fa-whatsapp fa-2x"></i>
        </span>
        Fale conosco
    </a>

@push('script')
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/custom-slick.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    @if($client->promotions($client->id) )
        @if(!session('message'))
            <script type="text/javascript">
                $(window).on('load', function() {
                    $('#competitorInscription').modal('show');
                });
            </script>
        @endif
    @endif
@endpush
    @endsection



