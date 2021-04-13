<div class="shopping__cart">
    <div class="shopping__cart__inner">
        <div class="offsetmenu__close__btn">
            <a href="#"><i class="zmdi zmdi-close"></i></a>
        </div>
        <div class="shp__cart__wrap">
            @if($cart_items)
                @foreach($cart_items->items as $key => $cart_item)

                    <div class="shp__single__product">
                        <div class="shp__pro__thumb">
                            <a href="#">
                                <img src="{{asset('storage/public/'.$cart_item->attachments()->get()[0]->path)}}" alt="product images">
                            </a>
                        </div>
                        <div class="shp__pro__details">
                            <h2><a href="#">{{ $cart_item['name'] }}</a></h2>
                            <span class="quantity">Quantidade: {{ $cart_item['quantity'] }}</span>
                            <span class="shp__price">@money($cart_item['price'])</span>
                        </div>
                        <div class="remove__btn">
                            <a href="{{ route('ecommerce.delete_product', [$cart_item['id'], $client->slug]) }}" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                @endforeach
           @endif
        </div>
        <ul class="shoping__total">
            <li class="subtotal">Total:</li>
            <li class="total__price">@money($cart_items ? $cart_items->totalPrice : 0)</li>
        </ul>
        <ul class="shopping__btn">
            <li class="shp__checkout"><a href="{{ route('ecommerce.show_cart', $client->slug) }}">Finalizar pedido</a></li>
        </ul>
    </div>
</div>