<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContractsRequest;
use App\Models\Advertsement;
use App\Models\Category;
use App\Models\Client;
use App\Models\Contract;
use App\Models\Payment;
use Illuminate\Http\Request;

class UsefulsController extends Controller
{

    public function index()
    {
        $contracts = Contract::where('status', 'UTEIS')->get();
        return view('admin.usefuls.index', compact('contracts'));
    }


    public function create()
    {
        $clients = Client::all();
        $advertsements = Advertsement::all();
        $payments = Payment::all();
        $categories = Category::all();
        return view('admin.usefuls.create', compact('clients', 'advertsements', 'payments', 'categories'));
    }


    public function store(ContractsRequest $request)
    {
        $contract = new Contract();
        $request->validated();

        $request['date_start'] = $contract->parseDateBD($request->date_start);
        $request['date_end'] = $contract->parseDateBD($request->date_end);
        $request['total'] = $contract->convertMonetary($request->total);
        $request['amount'] = $contract->convertMonetary($request->amount);
        $request['discount'] = $contract->convertMonetary($request->discount);
        $request['status'] = 'UTEIS';

        if ($request->hasFile('logo')) {
            $request['file'] = $contract->sendFile($request->file('logo'));
        }

        $contract->create($request->all());

        return redirect(route('usefuls.index'))->with('message', 'Uteis cadastrado com sucesso ');

    }


    public function edit($id)
    {
        $contract = Contract::where('id', $id)->first();
        $clients = Client::all();
        $advertsements = Advertsement::all();
        $payments = Payment::all();
        $categories = Category::all();
        return view ('admin.usefuls.edit', compact('contract', 'clients', 'advertsements', 'payments', 'categories'));
    }


    public function update(ContractsRequest $request, $id)
    {
        $contract = Contract::where('id', $id);
        $request->validated();

        $request['date_start'] = $contract->parseDateBD($request->date_start);
        $request['date_end'] = $contract->parseDateBD($request->date_end);
        $request['total'] = $contract->convertMonetary($request->total);
        $request['amount'] = $contract->convertMonetary($request->amount);

        if ($request->hasFile('logo')) {
            $request['file'] = $contract->sendFile($request->file('logo'));
        }

        $contract->update($request->all());

        return redirect(route('usefuls.index'))->with('message', 'Contrato alterado com sucesso ');
    }


    public function destroy($id)
    {
        $contract = Contract::where('id', $id);
        $contract->delete();

        return redirect(route('usefuls.index'))->with('message', 'Contrato apagado com sucesso!');
    }
}
