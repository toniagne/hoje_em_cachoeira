@extends('ecommerce.layout.master')
@section('layout')
    <div class="row">
        <div class="col-md-12">
            <div class="filter__menu__container">
                <div class="product__menu">
                    <button data-filter="*"  class="is-checked">Todos</button>
                    @foreach($client->ecommerce_categories()->get() as $ecommerce_category)
                        <button data-filter=".cat--{{ $ecommerce_category->id }}">{{ $ecommerce_category->name }}</button>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <!-- Start Filter Menu -->
    <div class="filter__wrap">
        <div class="filter__cart">
            <div class="filter__cart__inner">
                <div class="filter__menu__close__btn">
                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Filter Menu -->
    <!-- End Product MEnu -->
    <div class="row">
        <div class="product__list another-product-style">

            @foreach($client->products()->get() as $product)
                <div class="col-md-3 single__pro col-lg-3 cat--{{ $product->category->id }} col-sm-4 col-xs-12">
                <div class="product foo">
                    <div class="product__inner">
                        <div class="pro__thumb text-center">

                                <img src="{{asset('storage/public/'.$product->attachments()->get()[0]->path)}}" height="200px"/>

                        </div>
                        <div class="product__hover__info">
                            <ul class="product__action">
                                <li><a data-toggle="modal" data-target="#product-{{ $product->id }}" title="Visualizar produto" class="quick-view modal-view detail-link" href="#"><span class="ti-eye"></span></a></li>
                                <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="product__details">
                        <h2><a href="product-details.html">{{ $product->name }}</a></h2>
                        <ul class="product__price">
                            <li class="new__price">@money($product->value)</li>
                        </ul>
                    </div>
                </div>
                    @include('ecommerce.layout.modal-product')
            </div>

            @endforeach

        </div>
    </div>
@endsection