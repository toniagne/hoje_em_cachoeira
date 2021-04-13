<?php

namespace App\Http\Controllers\Gestao;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogsController extends Controller
{

    public function index()
    {
       $catalogs = Catalog::getClient()->get();
       return view('gestao.catalogs.index', compact('catalogs'));
    }


    public function create()
    {
        return view('gestao.catalogs.create');
    }


    public function store(Request $request)
    {
        $catalog = Catalog::create($request->all());

        $catalog->sendFiles($request->attachments);

        return redirect(route('gestao.catalogs.index'))->with('message', 'Catálogo lançado com sucesso !');

    }


    public function show($id)
    {
        //
    }


    public function edit(Catalog $catalog)
    {
        return view('gestao.catalogs.edit', compact('catalog'));
    }


    public function update(Request $request, $id)
    {
        $catalog = Catalog::find($id);

        $catalog->update($request->all());

        if($request->attachments)
        $catalog->sendFiles($request->attachments);

        return redirect(route('gestao.catalogs.index'))->with('message', 'Catálogo atualizado com sucesso !');

    }


    public function destroy(Catalog $catalog)
    {
        $catalog->delete();
        return redirect(route('gestao.catalogs.index'))->with('message', 'Catálogo apagado com sucesso !');

    }
}
