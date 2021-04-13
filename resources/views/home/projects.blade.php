@extends('layouts.site.app')
@section('title', 'Projetos')
@section('content')

    <!--========================= PAGE-COVER ======================-->
    <section class="page-cover back-size" id="topo-search">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Projetos Hoje em Cachoeira</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Inicio</a></li>
                        <li class="active">Projetos</li>
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

                        @forelse($projects as $project)
                            <div class="list-block main-block f-list-block">
                                <div class="list-content">
                                    <div class="main-img list-img f-list-img">
                                        <a href="{{ route('home.project.details', $project->slug) }}">
                                            <div class="f-img">
                                                <img src="{{asset('storage/public/'.$project->file)}}" class="img-responsive" alt="flight-img" />
                                            </div><!-- end f-list-img -->
                                        </a>
                                        <ul class="list-unstyled list-inline offer-price-1">
                                            <li class="price">{{ $project->name}}<br><br></li>
                                            <li>  </li>
                                        </ul>
                                    </div><!-- end f-list-img -->

                                    <div class="list-info f-list-info">
                                        <h3 class="block-title"><a href="{{ route('home.project.details', $project->slug) }}">{{ $project->name }}</a></h3>

                                        <a href="{{ route('home.project.details', $project->slug) }}" class="btn btn-orange">Veja mais detalhes</a>
                                    </div><!-- end f-list-info -->
                                </div><!-- end list-content -->
                            </div><!-- end f-list-block -->

                        @empty
                            <h2> Ainda não publicamos nossos projetos. Aguarde !!!</h2>
                        @endforelse

                    </div><!-- end columns -->

                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar">
                        @include('components.side-bar')
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end flight-listings -->
    </section><!-- end innerpage-wrapper -->
@endsection
