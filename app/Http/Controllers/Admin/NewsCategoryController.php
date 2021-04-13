<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::all();
        return view('news.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('news.categories.create');
    }


    public function store(Request $request)
    {
        $newsCategory = new NewsCategory();

        $newsCategory->create($request->all());

        return redirect(route('newscategory.index'))->with('message', 'Categoria adicionada com sucesso !');
    }

    public function edit(NewsCategory $newsCategory)
    {
        return view('news.categories.edit', compact('newsCategory'));
    }


    public function update($request, NewsCategory $newsCategory)
    {

        $newsCategory->update($request->all());

        return redirect(route('newscategory.index'))->with('message', 'Categoria editada com sucesso !');
    }


    public function destroy($id)
    {
        $newsCategory = NewsCategory::find($id);

        $newsCategory->delete();

        return redirect(route('newscategory.index'))->with('message', 'Categoria deletada com sucesso !');
    }
}
