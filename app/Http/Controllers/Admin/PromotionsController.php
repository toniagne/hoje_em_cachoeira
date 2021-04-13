<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Catalog;
use App\Models\Client;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{


    public function clients(){
        $clients = Client::all();
        return view('admin.promotions.clients', compact('clients'));
    }

    public function list_promotions(Client $client){
        $catalogs = Promotion::where('client_id', $client->id)->get();
        return view('admin.promotions.clients-list', compact('catalogs', 'client'));
    }

    public function index()
    {
        $catalogs = Catalog::all();
        return view('admin.promotions.index', compact('catalogs'));
    }


    public function create(Client $client)
    {
        return view('admin.promotions.create', compact('client'));
    }


    public function store(Request $request, Client $client)
    {
        $request['client_id'] = $client->id;
        $catalog = Promotion::create($request->all());

        $catalog->sendFiles($request->attachments);

        return redirect(route('promotions.list-catalogs', $client->id))->with('message', 'Catálogo lançado com sucesso !');
    }


    public function show($id)
    {
        //
    }


    public function edit(Promotion $promotion, Client $client)
    {
        return view('admin.promotions.edit', compact('promotion', 'client'));
    }


    public function update(Request $request, $id, Client $client)
    {
        $attachment = new Attachment();
        $catalog = Catalog::find($id);
        $catalog->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        foreach ($request->file_description as $key => $descriptions){
            $update = $attachment->where('id', $key)->update([
                'file_description' => $descriptions
            ]);
        }




        return redirect(route('promotions.list-catalogs', $client->id))->with('message', 'Catálogo lançado com sucesso !');

    }


    public function destroy(Promotion $promotion, Client $client)
    {
        $promotion->delete();

        return redirect(route('promotions.list-catalogs', $client->id))->with('message', 'Catálogo apagado com sucesso !');

    }
}
