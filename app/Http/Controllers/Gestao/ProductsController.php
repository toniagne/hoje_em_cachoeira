<?php

namespace App\Http\Controllers\Gestao;

use App\Http\Controllers\Controller;
use App\Models\EcommerceCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::getClient()->get();
        return view('gestao.products.index', compact('products'));
    }


    public function create()
    {
       $categories = EcommerceCategory::getClient()->get();
       return view('gestao.products.create', compact('categories'));
    }


    public function store(Request $request)
    {

       $product = Product::create($request->all());

       $product->setStock($request->get('stock'));

       $product->sendFiles($request->attachments);

        return redirect(route('gestao.products.index', $product->id))->with('message', 'Produto lançado com sucesso !');
    }

    public function show($id)
    {
        //
    }


    public function edit(Product $product)
    {
        $categories = EcommerceCategory::getClient()->get();

        $product->getPreloadFiles();
        return view('gestao.products.edit', compact('categories', 'product'));
    }


    public function update(Request $request, $id)
    {

        $product = Product::find($id);

        $product->update($request->all());

        $product->setStock($request->get('stock'));

        if ($request->attachments)
            $product->sendFiles($request->attachments);

        return redirect(route('gestao.products.index', $product->id))->with('message', 'Produto lançado com sucesso !');

    }


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('gestao.products.index'))->with('message', 'Produto deletado com sucesso !');
    }

    public function uploads(Request $request)
    {
        return response()->json(true);
    }
}
