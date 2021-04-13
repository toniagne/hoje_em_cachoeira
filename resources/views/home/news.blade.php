@extends('layouts.site.app')
@section('title', 'Notícias')
@section('content')
    @push('style')

        <meta property="og:url"           content="{{url()->current()}}" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="{{ $news->title }}" />
        <meta property="og:description"   content="{{ $news->description }}"  />
        <meta property="og:image"         content="{{  asset('storage/public/'.$news->attachments()->get()[0]->path)  }}" />
    @endpush
        <!--========================= PAGE-COVER ======================-->
    <section class="page-cover back-size" id="topo-search">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">{{ $configs->title }}</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Inicio</a></li>
                        <li class="active">Notícia - {{ $news->title }}</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->


    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
            <div class="container">
                <br>
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                                {!! $notice_body[0] !!}
                                <br>
                                @isset($notice_body[1])
                                    <a href="{{ $news->link }}">
                                        <img src="{{ asset('storage/public/'.$news->image) }}" alt="member-img" class="img-responsive" width="100%">
                                    </a>
                                    <br>
                                    {!! $notice_body[1] !!}
                                @endisset

                    </div><!-- end columns -->

                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar">

                        <div class="side-bar-block booking-form-block">

                            <div class="booking-form">
                                <h3>Todas as notícias</h3>
                                <br>
                                @foreach ($notices as $notice)

                                    <a href="{{ route('home.news', $notice->slug) }}">{{ $notice->title }}</a><br>
                                    <br>

                                @endforeach
                            </div><!-- end booking-form -->
                        </div><!-- end side-bar-block -->


                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->

    </section><!-- end innerpage-wrapper -->
@endsection
