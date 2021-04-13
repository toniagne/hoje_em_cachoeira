@extends('layouts.home')
@section('title', 'Seja Bem Vindo')
@section('content')
    <!-- Start Call-To-Action -->
    <section class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="call-to-main">
                        <h2>Sua empresa na  <span>Maior vitrine online</span> de Cachoeira do Sul.</h2>
                        <a href="{{ route('home.register') }}" class="btn"><i class="fa fa-send"></i>Clique aqui</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Call-To-Action -->


    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="slider-one">
            @foreach($news as $notice)
                <!-- Single Slider -->
                <div class="single-slider" style="background-image:url('images/slider/slider-bg1.jpg')">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <!-- Slider Text -->
                                <div class="slide-text text-center">
                                    <h1><span class="short">{{ $notice->get_category($notice->news_categtory_id) }}</span></h1>
                                    {{ $notice->description }}
                                    <div class="slide-btn mb-10">
                                        <a href="{{ route('home.news', $notice->slug) }}" class="btn primary ">leia na íntegra<i class="fa fa-play"></i>
                                            <div class="waves-block">
                                                <div class="waves wave-1"></div>
                                                <div class="waves wave-2"></div>
                                                <div class="waves wave-3"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <br>
                                    <img src="{{asset('storage/public/'.$notice->attachments()->get()[0]->path)}}"/>
                                </div>
                                <!--/ End SLider Text -->
                            </div>

                        </div>
                    </div>
                </div>
                <!--/ End Single Slider -->
           @endforeach

        </div>
    </section>
    <!--/ End Hero Area -->



    <!-- Start Features -->
    <section class="features">
        <div class="container">
            <div class="row">
                <!-- Features Single -->
                <div class="col-md-12 col-sm-12 col-xs-12 features-single">
                    <i class="fa fa-search"></i>
                    <h2>Pesquise no site</h2>
                    <form method="POST" action="{{ route('home.search') }}">
                        @csrf
                        <input type="search" name="words" class="form-control">
                    </form>
                </div>
                <!--/ End Features Single -->

            </div>
        </div>
    </section>
    <!--/ End Features -->




    <!-- Start Blogs -->
    <section id="blog-main" class="blog-main section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h1>Promoções do dia </h1>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-main">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="blog-slider">

                            @foreach($promotions as $promotion)
                                <!-- Single Slider -->
                                <div class="single-blog single-slider">
                                    <div class="blog-post">
                                        <div class="blog-head">
                                            <img src="{{asset('storage/public/'.$promotion->client->file)}}" alt="#">
                                            <a class="link" data-toggle="modal" data-target="#exampleModal-{{$promotion->id}}"><i class="fa fa-eye"></i></a>


                                        </div>
                                    </div>
                                </div>
                                <!--/ End Single Slider -->

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($promotions as $promotion)
            <div class="modal fade" id="exampleModal-{{$promotion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">FECHAR</button>
                            <h3 class="modal-title">{{ $promotion->client->name  }}</h3>
                        </div><!-- end modal-header -->

                        <div class="modal-body">



                                @foreach($promotion->attachments()->get() as $photo)

                                    <img src="{{asset('storage/public/'.$photo->path)}}" class="img-responsive" style="height: 550px;"/>
                                @endforeach



                        </div><!-- end modal-bpdy -->
                    </div><!-- end modal-content -->
                </div><!-- end modal-dialog -->
            </div>
        @endforeach
    </section>
    <!--/ End Blog -->

    <!-- Start Blogs -->
    <section id="destaques" class="blog-main section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h1>Destaques </h1>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-main">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="blog-slider">

                        @foreach($clients_list as $featured)
                            <!-- Single Slider -->
                                <div class="single-blog single-slider">
                                    <div class="blog-post">
                                        <div class="blog-head">
                                            <img src="{{asset('storage/public/'.$featured->file)}}" alt="#">
                                            <a class="link" href="{{ route('home.details', $featured->client->slug) }}"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Single Slider -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blog -->


    @foreach($carrosels as $carrosel)
        <section id="carrossels_{{ $carrosel->id }}" class="blog-main section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-title">
                            <h1>{{ $carrosel->name }}</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="blog-main">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="blog-slider">

                            @foreach($carrosel->clients()->get() as $contracts_carrosel)
                                <!-- Single Slider -->
                                    <div class="single-blog single-slider">
                                        <div class="blog-post">
                                            <div class="blog-head">
                                                @if($carrosel->id == "16")
                                                        <img src="{{asset('storage/public/'.$contracts_carrosel->file)}}" class="img-responsive"  />
                                                        <a class="link" href="{{ route('home.catalogs', $contracts_carrosel->client->slug) }}"><i class="fa fa-eye"></i></a>
                                                @else

                                                        <img src="{{asset('storage/public/'.$contracts_carrosel->file)}}" class="img-responsive"  />
                                                    <a class="link" href="{{ route('home.details', $contracts_carrosel->client->slug) }}"><i class="fa fa-eye"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Single Slider -->
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if($carrosel->get_banner($carrosel->id))
        <section id="services" class="services section">
            <div class="container">

                <a href="{{ $carrosel->get_banner($carrosel->id)['link'] }}" >
                    <img src="{{asset('storage/public/'.$carrosel->get_banner($carrosel->id)['path'])}}" class="img-bordered-sm img-fluid" width="100%" />
                </a>
            </div>
        </section>
        @endif
    @endforeach

@endsection

