<?php

namespace App;

use App\Models\Order;
use App\Models\OrderHasProduct;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class Cart
{
    public $items = [];
    public $totalQty ;
    public $totalPrice;

    public function __Construct($cart = null) {
        if($cart) {

            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        } else {

            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }

    public function add($product) {
        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->value,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ];

        if( !array_key_exists($product->id, $this->items)) {
            $this->items[$product->id] = $item ;
            $this->totalQty +=1;
            $this->totalPrice += $product->value;

        } else {

            $this->totalQty +=1 ;
            $this->totalPrice += $product->value;
        }

        //$this->items[$product->id]['quantity']  += 1 ;

    }

    public function remove($id) {

        if( array_key_exists($id, $this->items)) {
            $this->totalQty -= $this->items[$id]['quantity'];
            $this->totalPrice -= $this->items[$id]['quantity'] * $this->items[$id]['price'];

            unset($this->items[$id]);

        }
    }

    public function checkout(array $cart)
    {
        $cart_items = Session::get('cart');



        $order = Order::create([
            'client_id'     => $cart['client']->id,
            'customer_id'   => $cart['customer']->id,
            'amount'        => $cart_items->totalPrice,
            'token'         => $cart['token']
        ]);

        foreach ($cart_items->items as $key => $items)
        {

            OrderHasProduct::create([
                'order_id'      => $order->id,
                'client_id'     => $cart['client']->id,
                'customer_id'   => $cart['customer']->id,
                'product_id'    => $items['id'],
                'value'         => $items['price'],
                'qtd'           => $items['quantity']
            ]);
        }

        return true;
    }


}