<?php

namespace App\Http\Controllers\Gestao;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Category;
use App\Models\EcommerceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{

    public function index()
    {

        $categories = EcommerceCategory::where('client_id', Auth::guard('gestao')->user()->id)->get();
        return view('gestao.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('gestao.categories.create');
    }


    public function store(CategoriesRequest $request)
    {
        $request->validated();
        $category = new EcommerceCategory();

        $request['slug'] = Str::slug($request->name);
        $category->create($request->all());

        return redirect(route('gestao.categories.index'))->with('message', 'Categoria adicionada com sucesso !');
    }

    public function edit(EcommerceCategory $category)
    {
        return view('gestao.categories.edit', compact('category'));
    }


    public function update(CategoriesRequest $request, EcommerceCategory $category)
    {

        $request['slug'] = Str::slug($request->name);
        $category->update($request->all());

        return redirect(route('gestao.categories.index'))->with('message', 'Categoria editada com sucesso !');
    }


    public function destroy(EcommerceCategory $category)
    {
        $category->delete();

        return redirect(route('gestao.categories.index'))->with('message', 'Categoria deletada com sucesso !');
    }
}
