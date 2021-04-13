@extends('layouts.site.app')
@section('title', 'Quem Somos.')
@section('content')
@push('style')
    <style>
        .icon-btn { padding: 5px 15px 5px 5px; border-radius:10px;}
    </style>
    @endpush
    <!--========================= PAGE-COVER ======================-->
    <section class="page-cover back-size" id="topo-search">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">{{ $configs->title }}</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Inicio</a></li>
                        <li class="active">Anuncie conosco</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->


    <section class="innerpage-wrapper">
        <div id="registration" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
@isset($success)
    <h3>MENSAGEM ENVIADA COM SUCESSO</h3>
    @endisset
                        <div class="flex-content">
                            <div class="flex-content-img custom-form-img">
                                <object width="100%" height="360">
                                    <param name="movie" value="{{ asset('img/hoje-em-cachoeira-novo.mp4') }}"></param>
                                    <param name="allowFullScreen" value="true"></param>
                                    <param name="allowscriptaccess" value="always"></param>
                                    <embed src="{{ asset('img/hoje-em-cachoeira.mp4') }}"
                                           type="application/x-shockwave-flash"
                                           allowscriptaccess="always"
                                           allowfullscreen="true"
                                           width="100%"
                                           height="360">
                                    </embed>
                                </object>

                            </div><!-- end custom-form-img -->
                            <div class="custom-form custom-form-fields">
                                <h3>Seja nosso cliente</h3>
                                <p>Deixe seus contatos, que vamos entrar em contato com você. Invista na sua imagem.</p>
                                <a class="btn icon-btn btn-success btn-block" target="_blank" href="https://api.whatsapp.com/send?phone=5551989541018&amp;text=Oi! Gostaria de mais informações sobre Hoje em Cachoeira"><span class="fa fa-whatsapp fa-2x"></span>  &ensp; Quero mais informações.</a>
                                <form action="{{ route('home.send.contact') }}" method="POST">
@csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="company" placeholder="Nome Empresa"  required/>
                                        <span><i class="fa fa-user"></i></span>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Nome Responsável"  required/>
                                        <span><i class="fa fa-user"></i></span>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="E-mail"  required/>
                                        <span><i class="fa fa-envelope"></i></span>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="Telefone/WhatsApp"  required/>
                                        <span><i class="fa fa-phone"></i></span>
                                    </div>

                                    <button class="btn btn-orange btn-block">Enviar</button>
                                </form>

                            </div><!-- end custom-form -->


                        </div><!-- end form-content -->

                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end registration -->
    </section><!-- end innerpage-wrapper -->
@endsection
