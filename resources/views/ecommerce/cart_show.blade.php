@extends('ecommerce.layout.master')
@section('layout')
    <!-- cart-main-area start -->
    <div class="cart-main-area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <form action="{{route('ecommerce.checkout', $client->slug)}}" method="post">
                        @csrf
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Imagem</th>
                                    <th class="product-name">Produto</th>
                                    <th class="product-price">Valor</th>
                                    <th class="product-quantity">Quantidade</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remover</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart_items->items as $key => $cart_item)
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="{{ asset('storage/public/'.$cart_item['associatedModel']->attachments()->get()[0]->path) }}" alt="product img" /></a></td>
                                        <td class="product-name"><a href="#">{{ $cart_item['name'] }}</a></td>
                                        <td class="product-price"><span class="amount">@money($cart_item['price'])</span></td>
                                        <td class="product-quantity"><input type="number" value="1" /></td>
                                        <td class="product-subtotal">@money($cart_item['price'])</td>
                                        <td class="product-remove"><a href="{{ route('ecommerce.delete_product', [$cart_item['id'], $client->slug]) }}">X</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-7 col-xs-12">

                                <div class="coupon">
                                    <h3>Cupom</h3>
                                    <p>Digite o código de desconto.</p>
                                    <input type="text" placeholder="Código do cupom" />
                                    <input type="submit" value="Enviar" />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-5 col-xs-12">
                                <div class="cart_totals">
                                    <h2>Total</h2>
                                    <table>
                                        <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">@money($cart_items->totalPrice)</span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Entrega</th>
                                            <td>
                                                <ul id="shipping_method">
                                                    <li>
                                                        <input type="radio" name="freight" value="7.00"/>
                                                        <label>
                                                            Motoboy: <span class="amount">R$ 7,00</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="freight" value="0.00"/>
                                                        <label>
                                                            Retirar na loja: <span class="amount">R$ 0,00</span>
                                                        </label>
                                                    </li>
                                                    <li></li>
                                                </ul>
                                                <p><a class="shipping-calculator-button" href="#">Valor à pagar</a></p>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong><span class="amount">@money($cart_items->totalPrice)</span></strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="wc-proceed-to-checkout">
                                        <button class="btn btn-primary btn-lg">Finalizar a compra </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-main-area end -->
@endsection