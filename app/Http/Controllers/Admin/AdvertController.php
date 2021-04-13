<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Banner;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdvertController extends Controller
{
    public function index()
    {
        $categories = Advert::all();
        return view('admin.adverts.index', compact('categories'));
    }


    public function create()
    {
        $clients = Client::all();
        $carrossels = Banner::all();
        return view('admin.adverts.create', compact('clients', 'carrossels'));
    }


    public function store(Request $request)
    {


        $request['slug'] = Str::slug($request->name);

        $advert = Advert::create($request->all());

         $advert->sendFile($request->attachments);


        return redirect(route('adverts.index'))->with('message', 'Categoria adicionada com sucesso !');
    }

    public function edit(Advert $advert)
    {
        return view('admin.adverts.edit', compact('advert'));
    }


    public function update(Request $request, Advert $advert)
    {

        if ($request->hasFile('file')) {
            $request['file'] = $advert->sendFile($request->file('file'));
        }
        $request['slug'] = Str::slug($request->name);
        $advert->update($request->all());

        return redirect(route('adverts.index'))->with('message', 'Categoria editada com sucesso !');
    }


    public function destroy(Advert $advert)
    {
        $advert->delete();

        return redirect(route('adverts.index'))->with('message', 'Categoria deletada com sucesso !');
    }
}
