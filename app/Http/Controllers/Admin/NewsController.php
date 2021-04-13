<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $notices = News::all();

        return view('news.list.index', compact('notices'));
    }


    public function create()
    {
        $categories = NewsCategory::all();

        return view('news.list.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request['slug'] = $request->get('title');

        $news = News::create($request->all());

        $news->sendFiles($request->attachments);

        return redirect(route('news.index'))->with('message', 'Notícia adicionada com sucesso !');
    }

    public function edit(News $news)
    {
        $categories = NewsCategory::all();

        return view('news.list.edit', compact('categories', 'news'));
    }


    public function update(Request $request, News $news)
    {
        $request['slug'] = $request->get('title');

        if ($request->hasFile('logo')) {
            $request['image'] = $news->sendFile($request->file('logo'));
        }

        $news->update($request->all());

        return redirect(route('news.index'))->with('message', 'Categoria editada com sucesso !');
    }


    public function destroy($id)
    {
        $news = News::find($id);

        $news->delete();

        return redirect(route('news.index'))->with('message', 'Notícia deletada com sucesso !');
    }
}
