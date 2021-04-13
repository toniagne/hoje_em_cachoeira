@extends('ecommerce.layout.master')
@section('layout')
<!-- Start Login Register Area -->
<div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat scroll center center / cover ;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="login__register__menu" role="tablist">
                    <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Cliente</a></li>
                    <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Cadastro</a></li>
                </ul>
            </div>
        </div>
        <!-- Start Login Register Content -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="htc__login__register__wrap">
                    @if(Session::get('error'))
                        {{ Session::get('error') }}
                    @endif;
                    <!-- Start Single Content -->
                    <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                        <form class="login" method="post" action="{{ route('ecommerce.confirm', $client->slug) }}">
                            @csrf
                            <input type="hidden" name="segment" value="login">
                            <input type="text" name="name" placeholder="Seu nome completo*">
                            <input type="text" name="cpf" placeholder="CPF*">


                            <div class="htc__login__btn mt--30">
                                <button class="btn btn-success">CONTINUAR</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                        <form class="login" method="post" action="{{ route('ecommerce.confirm', $client->slug) }}">
                            @csrf
                            <input type="hidden" name="segment" value="register">
                            <input type="text" name="name" placeholder="Nome completo*">
                            <input type="text" name="cpf" placeholder="CPF*">
                            <input type="text" name="phone" placeholder="Telefone/WhatsApp*">

                            <div class="htc__login__btn">
                                <button class="btn btn-success">CONTINUAR</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
        <!-- End Login Register Content -->
    </div>
</div>
<!-- End Login Register Area -->
@endsection