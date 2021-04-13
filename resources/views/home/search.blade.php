@extends('layouts.site.app')
@section('title', 'Pesquias encontradas.')
@section('content')
@push('style')
    <style>
        .btn-whatsapp {
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
        }
    </style>
@endpush
<!--========================= PAGE-COVER ======================-->
<section class="page-cover back-size" id="topo-search">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-title">Pesquisa de Empresas</h1>
                <ul class="breadcrumb">
                    <li><a href="#">Inicio</a></li>
                    <li class="active">Pesquisar por</li>
                </ul>
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end page-cover -->


<!--===== INNERPAGE-WRAPPER ====-->
<section class="innerpage-wrapper">
    <div id="flight-listings" class="innerpage-section-padding">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-9 content-side">

                    @forelse($results as $result)
                    <div class="list-block main-block f-list-block">
                        <div class="list-content">
                            <div class="main-img list-img f-list-img">
                                <a href="{{ $result->advertsement_id == 3 ? '#' : $result->advertsement_id == 11 ? '#'  : route('home.details', $result->client->slug) }}">
                                    <div class="f-img">
                                        <img src="{{asset('storage/public/'.$result->file)}}" class="img-responsive" alt="flight-img" />
                                    </div><!-- end f-list-img -->
                                </a>
                                <ul class="list-unstyled list-inline offer-price-1" style="padding: 14px 4px 11px;!important;">
                                    @isset($result->category)
                                        <li class="duration"><i class="fa fa-bookmark"></i><span>{{ $result->category->name }}</span></li>

                                        <li class="price"> {{ $result->client->phone == "" ? $result->client->phone_comercial : $result->client->phone }}</li>

                                    @endisset
                                </ul>
                            </div><!-- end f-list-img -->
                            @isset($result->client->name)
                            <div class="list-info f-list-info">
                                <h3 class="block-title">

                                        <a href="{{ $result->advertsement_id == 3 ? '#' : $result->advertsement_id == 11 ? '#'  : route('home.details', $result->client->slug) }}">{{ $result->client->name }}</a>

                                </h3>
                                <p class="block-minor"><span>{{ $result->client->address }}</span> Cachoeira do Sul - RS </p>
                                <p>{!! $result->client->services !!}</p>

                                @if($result->advertsement_id == 11)
                                    <a href="https://api.whatsapp.com/send?phone=55{{ preg_replace('/[^\dxX]/', '', $result->client->phone == "" ? $result->client->phone_comercial : $result->client->phone ) }}&amp;text=Oi, quero mais informações." target="_blank" class="btn btn-success text-white">
                                        <span> <i class="fa fa-whatsapp"></i> </span>  Whats
                                    </a>
                                    <a href="tel:{{ preg_replace('/[^\dxX]/', '', $result->client->phone == "" ? $result->client->phone_comercial : $result->client->phone ) }}" class="btn btn-orange rounded"> Ligar </a>
                                @else
                                    @if($result->advertsement_id <> 3)
                                        <a href="{{ $result->advertsement_id == 3 ? '#': route('home.details', $result->client->slug) }}" class="btn btn-orange rounded42">Detalhes</a>
                                        <a href="https://api.whatsapp.com/send?phone=55{{ preg_replace('/[^\dxX]/', '', $result->client->phone == "" ? $result->client->phone_comercial : $result->client->phone ) }}&amp;text=Oi, quero mais informações." target="_blank" class="btn btn-success text-white">
                                            <span> <i class="fa fa-whatsapp"></i> </span>  Whats
                                        </a>
                                        <a href="tel:{{ preg_replace('/[^\dxX]/', '', $result->client->phone == "" ? $result->client->phone_comercial : $result->client->phone ) }}" class="btn btn-orange"> Ligar </a>
                                    @endif
                                @endif

                            </div><!-- end f-list-info -->

                            @endisset
                        </div><!-- end list-content -->
                    </div><!-- end f-list-block -->

                    @empty
                    <h2> Não encontramos nenhum resultado para a pesquisa digitada "{{$words}}"</h2>
                    @endforelse

                </div><!-- end columns -->

                @isset($banners)
                <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar">
                    @include('components.side-bar', ['banners' => $banners])
                </div><!-- end columns -->
                @endisset
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end flight-listings -->
</section><!-- end innerpage-wrapper -->
@endsection
