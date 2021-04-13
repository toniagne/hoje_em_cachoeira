<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Config;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use View;

class EcommerceController extends Controller
{
    protected $user_id, $cart_items;

    public function __construct()
    {
        $this->configs = Config::all()->first();
        $this->categories = Category::all()->sortBy('name');
        $this->contracts = new Contract();

        View::share('configs', $this->configs);
        View::share('categories', $this->categories);
        View::share('client', Client::where('slug', request()->slug)->first());
    }

    public function index($slug, Request $request)
    {

        $cart_items = Session::get('cart');

        return view('ecommerce.index', compact('cart_items', 'slug'));
    }

    public function add_cart(Product $product)
    {
        if (Session::has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);

        Session::put('cart', $cart);

        return redirect()->route('ecommerce.show_cart', $product->client->slug)->with('success', 'Product was added');

    }

    public function cart($slug, Request $request)
    {
        $user_id = Session::get('user_id');

        //Session::forget([$user_id, 'user_id']);
        Session::flush();

        dd(Session::all());

    }

    public function clear($slug)
    {

        //$user_id = Session::get('user_id');

        //Session::forget(['user_id']);
        Session::flush();

        dd(Session::all());
    }

    public function delete_product(Product $product, $slug)
    {

        $cart = new Cart(Session::get('cart'));
        $cart->remove($product->id);

        if ($cart->totalQty <= 0) {
            Session::forget('cart');
        } else {
            Session::put('cart', $cart);
        }

        return redirect()->route('ecommerce.show_cart', $slug)->with('success', 'Product was removed');

    }

    public function show_cart($slug)
    {
        $cart_items = new Cart(Session::get('cart'));

        return view('ecommerce.cart_show', compact('cart_items'));
    }

    public function checkout($slug, Request $request)
    {
        $cart_items = new Cart(Session::get('cart'));

        return view('ecommerce.login_register', compact('cart_items'));
    }

    public function login_register($slug, Request $request)
    {
        $cart_items = new Cart(Session::get('cart'));

        return view('ecommerce.login_register', compact('cart_items'));
    }

    public function confirm($slug, Request $request)
    {

        if ($request->get('segment') == 'login') {
            $customer = Customer::where('name', $request->get('name'))->where('cpf', $request->get('cpf'))->first();
        } else {
            $customer = Customer::create($request->except('_token'));
        }

        if (!$customer) {
            return redirect(route('ecommerce.confirm.get', $slug))->with('error', 'Você não consta na nossa base de dados, tente registrar-se.');
        }

        $token = Str::random(10);

        $cart = [
            'customer'  => $customer,
            'client'    => Client::where('slug', request()->slug)->first(),
            'token'     => $token
        ];

        $pay_order = new Cart(Session::get('cart'));

        if ($pay_order->checkout($cart)) {
            return redirect(route('ecommerce.completed', $slug))->with('customer', $customer);
        }
    }

    public function completed(Client $client)
    {

        Session::forget('cart');

        $cart_items = [];
        $customer = Session::get('customer');

        $order = Order::where('customer_id', $customer);

        return view('ecommerce.completed', compact('customer', 'client', 'cart_items'));
    }
}