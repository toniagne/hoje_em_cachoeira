@extends('layouts.site.app')
@section('title', 'Pesquias encontradas.')
@section('content')

    <!--========================= PAGE-COVER ======================-->
    <section class="page-cover back-size" id="topo-search">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Termos de uso</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Inicio</a></li>
                        <li class="active">Termos</li>
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


                    {!! $configs->terms !!}


                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end flight-listings -->
    </section><!-- end innerpage-wrapper -->
@endsection
