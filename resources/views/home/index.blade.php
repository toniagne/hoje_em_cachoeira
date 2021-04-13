@extends('layouts.site.app')
@section('title', 'Seja Bem Vindo')
@section('content')
@push('style')
    <style>
        .modal.fade {
            z-index: 10000000 !important;
        }

        .title-news {
            color: #0b0b0b;
        }


    </style>
@endpush
<!--========================= FLEX SLIDER =====================-->
<section class="flexslider-container" id="flexslider-container-1" style="background-image: url({{ asset('storage/public/'.$configs->slides)}}); background-size: cover;">




    <div class="flexslider slider" id="slider-1">
        <ul class="slides">

            <li class="item-1" style="background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url({{ asset('storage/public/'.$configs->slides)}}) 50% 0%;
                    background-size:cover;
                    height:100%;">
                <div class=" meta px-4" >
                    @if ($news->count() >= 5)
                        <div class="container" style="background-color: #ffffff;">
                            <section class="banner-sec ">
                                <div class="container">
                                    <div class="row "><div class="col-lg-12"> <br> </div></div>
                                    <div class="row "><div class="col-lg-12"> <h4 class="title-news">Notícias de Cachoeira do Sul</h4></div></div>
                                    <div class="row "><div class="col-lg-12"> <br> </div></div>
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <div class="card mt--15">


                                                <div class="card-body">
                                                    <div class="row">

                                                        <div class="col-sm-8">
                                                            <div class="card-img-overlay"> <span class="badge badge-pill badge-danger"> {{ $news[0]->get_category($news[0]->news_categtory_id) }}</span> </div>
                                                            <h4 class=""><a href="{{ route('home.news', $news[0]->slug) }}">{{ $news[0]->description }}</a></h4>
                                                        </div>
                                                        <div class="col-sm-4 text-center">
                                                            <img src="{{asset('storage/public/'.$news[0]->attachments()->get()[0]->path)}}" class="mt--30" height="70px"/>
                                                        </div>
                                                    </div>


                                                    <p class="card-text"><small class="text-time"><em> <hr> </em></small></p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </section>


                        </div><!-- end container -->
                    @endif
                </div><!-- end meta -->
            </li><!-- end item-1 -->



        </ul>
    </div><!-- end slider -->

    <div class="search-tabs" id="search-tabs-1">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">



                    <div class="tab-content d-flex ">

                        <div id="flights" class="tab-pane in active">
                            <form method="POST" action="{{ route('home.search') }}">
                                @csrf
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group left-icon">
                                                    <input type="text" name="words" class="form-control" placeholder="Pesquisa" >
                                                    <i class="fa fa-search"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->



                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 search-btn">
                                        <button class="btn btn-orange">Pesquisa</button>
                                    </div><!-- end columns -->

                                </div><!-- end row -->
                            </form>
                        </div><!-- end tours -->


                    </div><!-- end tab-content -->

                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end search-tabs -->

</section><!-- end flexslider-container -->

<div id="team" >
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="owl-carousel owl-theme" id="owl-team">

                    @foreach($categories as $category)
                    <div class="item owl-item" >
                        <div class="member-block" >
                            <div class="member-img">
                                <a href="{{ route('home.category', $category->slug) }}">
                                    <img src="{{ asset('storage/public/'.$category->icon) }}" class="img-responsive img-circle" alt="member-img"/>
                                </a>
                            </div><!-- end member-img -->

                            <div class="member-name">
                                <a href="{{ route('home.category', $category->slug) }}">
                                    <h3>{{ $category->name }}</h3>
                                </a>
                            </div><!-- end member-name -->
                        </div><!-- end member-block -->
                    </div><!-- end item -->
                    @endforeach

                </div><!-- end owl-team -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end team -->


<section id="hotel-offers">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-heading">
                    <h2>PROMOÇÕES</h2>
                    <hr class="heading-line" />
                </div><!-- end page-heading -->

                <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-car-offers">

                    @foreach($promotions as $promotion)

                        <div class="item">
                            <div class="main-block car-offer-block">
                                <div class="main-img car-offer-img">
                                    <a data-toggle="modal" data-target="#edit-card-{{$promotion->id}}">
                                    <img src="{{asset('storage/public/'.$promotion->client->file)}}" class="img-responsive" />
                                    </a>
                                </div><!-- end car-offer-img -->

                                <div class="car-offer-info">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="{{ route('home.details', $promotion->client->slug) }}"><h4>{{ $promotion->client->name }}</h4></a>
                                        </li>
                                    </ul>
                                </div><!-- end car-offer-info -->
                            </div><!-- end car-offer-block -->




                        </div><!-- end item -->

                    @endforeach
                </div><!-- end owl-car-offers -->


            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->

    @foreach($promotions as $promotion)
    <div id="edit-card-{{$promotion->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">FECHAR</button>
                    <h3 class="modal-title">{{ $promotion->client->name  }}</h3>
                </div><!-- end modal-header -->

                <div class="modal-body">


                    <div class="owl-carousel owl-theme owl-custom-arrow owl-holidays">

                        @foreach($promotion->attachments()->get() as $photo)
                        <div class="item">
                            <img src="{{asset('storage/public/'.$photo->path)}}" class="img-responsive" style="height: 550px;"/>
                        </div><!-- end item -->
                        @endforeach




                    </div>

                </div><!-- end modal-bpdy -->
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div>
    @endforeach
</section><!-- end hotel-offers -->


<!--=============== EMPRESAS EM DESTAQUE ===============-->
<section id="hotel-offers">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-heading">
                    <h2>EM DESTAQUE</h2>
                    <hr class="heading-line" />
                </div><!-- end page-heading -->

                <div class="owl-carousel owl-theme" id="owl-hoje-offers">

               
                    @foreach($clients_list as $featured)
                    <div class="item">
                        <div class="main-block hotel-block">
                            <div class="main-img">
                                <a href="{{ route('home.details', $featured->client->slug) }}">
                                    <img src="{{asset('storage/public/'.$featured->file)}}" class="img-responsive"  />
                                </a>
                                <div class="main-mask">
                                    <ul class="list-unstyled list-inline offer-price-1">
                                        <li class="price"><i class="fa fa-phone"></i>{{ $featured->client->phone_comercial }}</li>

                                    </ul>
                                </div><!-- end main-mask -->
                            </div><!-- end offer-img -->

                            <div class="main-info hotel-info">
                                <div class="arrow">
                                    <a href="{{ route('home.details', $featured->client->slug) }}"><span><i class="fa fa-angle-right"></i></span></a>
                                </div><!-- end arrow -->

                                <div class="main-title hotel-title">
                                    <a href="#">{{ $featured->client->name }}</a>
                                    <p></p>
                                </div><!-- end hotel-title -->
                            </div><!-- end hotel-info -->
                        </div><!-- end hotel-block -->
                    </div><!-- end item -->
                    @endforeach
                </div><!-- end owl-hotel-offers -->

            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->

    @foreach($carrosels as $carrosel)

        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-heading">
                        <h2>{{ $carrosel->name }}</h2>
                        <hr class="heading-line" />
                    </div><!-- end page-heading -->

                    <div class="owl-carousel owl-theme" id="owl-{{ $carrosel->id }}">

                        @foreach($carrosel->clients()->get() as $contracts_carrosel)
                            <div class="item">
                                <div class="main-block hotel-block">
                                    <div class="main-img">

                                        @if($carrosel->id == "15")
                                            <a href="{{ route('home.catalogs', $contracts_carrosel->client->slug) }}">
                                                <img src="{{asset('storage/public/'.$contracts_carrosel->file)}}" class="img-responsive"  />
                                            </a>
                                        @else
                                            <a href="{{ route('home.details', $contracts_carrosel->client->slug) }}">
                                                <img src="{{asset('storage/public/'.$contracts_carrosel->file)}}" class="img-responsive"  />
                                            </a>
                                        @endif



                                        <div class="main-mask">
                                            <ul class="list-unstyled list-inline offer-price-1">
                                                <li class="price"><i class="fa fa-phone"></i>{{ $contracts_carrosel->client->phone_comercial }}</li>

                                            </ul>
                                        </div><!-- end main-mask -->
                                    </div><!-- end offer-img -->

                                    <div class="main-info hotel-info">
                                        <div class="arrow">
                                            @if($carrosel->id == "15")
                                                <a href="{{ route('home.catalogs', $contracts_carrosel->client->slug) }}"><span><i class="fa fa-angle-right"></i></span></a>
                                            @else
                                                <a href="{{ route('home.details', $contracts_carrosel->client->slug) }}"><span><i class="fa fa-angle-right"></i></span></a>
                                            @endif


                                        </div><!-- end arrow -->


                                    </div><!-- end hotel-info -->
                                </div><!-- end hotel-block -->
                            </div><!-- end item -->
                        @endforeach
                    </div><!-- end owl-hotel-offers -->

                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->

    @endforeach
</section><!-- end hotel-offers -->



@push('script')

    <script>
        $('.carousel').carousel();
    </script>

    @foreach($carrosels as $carrosel)

        <script>

            $('#owl-{{ $carrosel->id }}').owlCarousel({
                items : 3,
                itemsCustom : false,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [991,2],
                itemsTablet: [768,2],
                itemsTabletSmall: [600,1],
                itemsMobile : [479,1],
                singleItem : false,
                itemsScaleUp : false,

                //Autoplay
                autoPlay : true,
                stopOnHover : true,

                // Navigation
                navigation : true,
                navigationText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                rewindNav : true,
                scrollPerPage : false,

                //Pagination
                pagination : false,
                paginationNumbers: false,

                // Responsive
                responsive: true,
                responsiveRefreshRate : 200,
                responsiveBaseWidth: window,
            });

            $('#myTab a').click(function (e) {
                e.preventDefault()
                $(this).tab('show')
            })


            $(window).load(function() {
                var boxheight = $('#myCarousel .carousel-inner').innerHeight();
                var itemlength = $('#myCarousel .item').length;
                var triggerheight = Math.round(boxheight/itemlength+1);
                $('#myCarousel .list-group-item').outerHeight(triggerheight);
            });

            var monthNames = [ "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December" ];
            var dayNames= ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]

            var newDate = new Date();
            newDate.setDate(newDate.getDate() + 1);
            $('#Date').html(dayNames[newDate.getDay()] + ", " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());


        </script>
    @endforeach
@endpush
@endsection
