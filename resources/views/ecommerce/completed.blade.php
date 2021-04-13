@extends('ecommerce.layout.master')
@section('layout')
<!-- Start Checkout Area -->
<section class="our-checkout-area ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="ckeckout-left-sidebar">
                    <!-- Start Checkbox Area -->
                    <div class="checkout-form">
                        <h2 class="section-title-3">Parabéns - {{ $customer->name }}</h2>
                        <div class="checkout-form-inner">
                             <h3> Sua compra foi concluída com sucesso.</h3>
                            <p>Em breve, o vendedor <b>{{ $client->name }}</b> entrará em contato.</p>
                        </div>
                    </div>
                    <!-- End Checkbox Area -->
                    <!-- Start Payment Box -->

                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="checkout-right-sidebar">
                    <div class="our-important-note">
                        <h2 class="section-title-3">Detalhes do vendedor :</h2>
                        <p class="note-desc">{{ $client->name }}</p>
                        <ul class="important-note">
                            <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Telefone: {{ $client->phone }}</a></li>
                            <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Endereço: {{ $client->address }}</a></li>
                        </ul>
                    </div>
                    <div class="puick-contact-area mt--60">
                        <h2 class="section-title-3">Atendimento por whats</h2>
                        <a href="phone:+5551995413966">51 99541-3966 </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Checkout Area -->
@endsection