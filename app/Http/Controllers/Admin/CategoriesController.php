<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(CategoriesRequest $request, Category $category)
    {
        $request->validated();

        if ($request->hasFile('file')) {
            $request['icon'] = $category->sendFile($request->file('file'));
        }
        $request['slug'] = Str::slug($request->name);
        $category->create($request->all());

        return redirect(route('categories.index'))->with('message', 'Categoria adicionada com sucesso !');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }


    public function update(CategoriesRequest $request, Category $category)
    {
        $request->validated();

        if ($request->hasFile('file')) {
            $request['icon'] = $category->sendFile($request->file('file'));
        }
        $request['slug'] = Str::slug($request->name);
        $category->update($request->all());

        return redirect(route('categories.index'))->with('message', 'Categoria editada com sucesso !');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect(route('categories.index'))->with('message', 'Categoria deletada com sucesso !');
    }
}
