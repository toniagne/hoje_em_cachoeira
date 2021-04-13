<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientsRequest;
use App\Models\Attachment;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use TJGazel\Toastr\Facades\Toastr;

class ClientsController extends Controller
{

    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }


    public function create()
    {
        return view('admin.clients.create');
    }


    public function store(ClientsRequest $request)
    {
        //  FAZ A VALIDAÇÃO DOS CAMPOS
        $request->validated();

        $request['city_id'] = 1;
        $request['active']  = 1;
        $request['slug'] = Str::slug($request->name);

        if ($request->hasFile('logo')) {
           $request['file'] = Client::sendFile($request->file('logo'));
        }

        $client = Client::create($request->all());

        $client->sendFiles($request->attachments);

        return redirect(route('clients.index'));

    }


    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }


    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }


    public function update(ClientsRequest $request, Client $client)
    {
        //  FAZ A VALIDAÇÃO DOS CAMPOS
        $request->validated();

        if ($request->hasFile('logo')) {
            $request['file'] = $client->sendFile($request->file('logo'));
        }
        $request['slug'] = Str::slug($request->name);
        $client->update($request->all());

        $client->sendFiles($request->attachments);
        return redirect(route('clients.index'))->with(['message'=>'Cliente alterado com sucesso']);
    }


    public function destroy(Client $client)
    {
        $client->delete();
        return redirect(route('clients.index'))->with(['message'=>'Cliente deletado com sucesso !']);
    }

    public function photos(Attachment $attachment, Client $client){
        $attachment->delete();
        return redirect(route('clients.edit', $client->id))->with(['message'=>'Imagem deletada com sucesso !']);
    }
}
