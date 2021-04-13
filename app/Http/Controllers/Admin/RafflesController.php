<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Client;
use App\Models\Competitor;
use App\Models\Raffle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RafflesController extends Controller
{

    public function clients(){
        $clients = Client::all();
        return view('admin.raffles.clients', compact('clients'));
    }

    public function list_raffles(Client $client){
        $raffles = Raffle::where('client_id', $client->id)->get();
        return view('admin.raffles.clients-list', compact('raffles', 'client'));
    }

    public function index()
    {
        $raffles = Raffle::all();
        return view('admin.raffles.index', compact('raffles'));
    }


    public function create(Client $client)
    {
        return view('admin.raffles.create', compact('client'));
    }


    public function store(Request $request, Client $client)
    {
        $request['client_id'] = $client->id;
        $request['end'] = $this->parseDateBD($request->end);
        $raffles = Raffle::create($request->all());

        $raffles->sendFiles($request->attachments);

        return redirect(route('raffles.list-raffles', $client->id))->with('message', 'Sorteio lançado com sucesso !');
    }


    public function show($id)
    {
        //
    }


    public function edit(Raffle $raffle, $client_id)
    {
        $client = Client::find($client_id);
        return view('admin.raffles.edit', compact('raffle', 'client'));
    }


    public function update(Request $request, $id, Client $client)
    {
        $attachment = new Attachment();
        $raffles = Raffle::find($id);
        $raffles->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        foreach ($request->file_description as $key => $descriptions){
            $update = $attachment->where('id', $key)->update([
                'file_description' => $descriptions
            ]);
        }




        return redirect(route('raffles.list-raffles', $client->id))->with('message', 'Sorteio lançado com sucesso !');

    }


    public function destroy(Raffle $raffle, Client $client)
    {
        $raffle->delete();

        return redirect(route('raffles.list-raffles', $client->id))->with('message', 'Sorteio apagado com sucesso !');

    }

    public function parseDateBD($date){
        return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    public function competitors(Raffle $raffle, Client $client)
    {
        return view('admin.raffles.competitors', compact('raffle', 'client'));
    }

    public function gift(Competitor $competitor, Client $client)
    {

        return redirect(route('raffles.list-raffles', $client->id))->with('message', 'Sorteio apagado com sucesso !');
    }
}
