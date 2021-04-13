<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Catalog;
use App\Models\Client;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{

    public function clients(){
        $clients = Client::all();
        return view('admin.ecommerce.clients', compact('clients'));
    }

    public function list_ecommerce(Client $client){
        $ecommerce = Catalog::where('client_id', $client->id)->get();
        return view('admin.ecommerce.clients-list', compact('ecommerce', 'client'));
    }

    public function index()
    {
        $ecommerce = Catalog::all();
        return view('admin.ecommerce.index', compact('ecommerce'));
    }


    public function create(Client $client)
    {
        return view('admin.ecommerce.create', compact('client'));
    }


    public function store(Request $request, Client $client)
    {
        $request['client_id'] = $client->id;
        $catalog = Catalog::create($request->all());

        $catalog->sendFiles($request->attachments);

        return redirect(route('ecommerce.list-ecommerce', $client->id))->with('message', 'Catálogo lançado com sucesso !');
    }


    public function show($id)
    {
        //
    }


    public function edit(Catalog $catalog, Client $client)
    {
        return view('admin.ecommerce.edit', compact('catalog', 'client'));
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




        return redirect(route('ecommerce.list-ecommerce', $client->id))->with('message', 'Catálogo lançado com sucesso !');

    }


    public function destroy(Catalog $catalog, Client $client)
    {
        $catalog->delete();

        return redirect(route('ecommerce.list-ecommerce', $client->id))->with('message', 'Catálogo apagado com sucesso !');

    }
}
