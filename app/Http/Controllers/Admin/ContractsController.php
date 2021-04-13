<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContractsRequest;
use App\Models\Advertsement;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Client;
use App\Models\Contract;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContractsController extends Controller
{

    public function index()
    {
        $contracts = Contract::all();
        return view('admin.contracts.index', compact('contracts'));
    }


    public function create()
    {
        $carrosels = Banner::all();
        $clients = Client::all();
        $advertsements = Advertsement::all();
        $payments = Payment::all();
        $categories = Category::all();
        return view('admin.contracts.create', compact('clients', 'advertsements', 'payments', 'categories', 'carrosels'));
    }


    public function store(ContractsRequest $request)
    {
       $contract = new Contract();
       $request->validated();

        $request['date_start'] = $contract->parseDateBD($request->date_start);
        $request['date_end'] = $contract->parseDateBD($request->date_end);
        $request['total'] = $contract->convertMonetary($request->total);
        $request['amount'] = $contract->convertMonetary($request->amount);
        $request['status'] = 'NOVO';

        if ($request->hasFile('logo')) {
            $request['file'] = $contract->sendFile($request->file('logo'));
        }

       $contract->create($request->all());

        return redirect(route('contracts.index'))->with('message', 'Contrato cadastrado com sucesso ');
    }


    public function show($id)
    {
        //
    }


    public function edit(Contract $contract)
    {
        $carrosels = Banner::all();
        $clients = Client::all();
        $advertsements = Advertsement::all();
        $payments = Payment::all();
        $categories = Category::all();
         return view ('admin.contracts.edit', compact('contract', 'clients', 'advertsements', 'payments', 'categories', 'carrosels'));
    }


    public function update(ContractsRequest $request, Contract $contract)
    {
         $request->validated();

        $request['date_start'] = $contract->parseDateBD($request->date_start);
        $request['date_end'] = $contract->parseDateBD($request->date_end);
        $request['total'] = $contract->convertMonetary($request->total);
        $request['amount'] = $contract->convertMonetary($request->amount);

        if ($request->hasFile('logo')) {
            $request['file'] = $contract->sendFile($request->file('logo'));
        }

         $contract->update($request->all());

        return redirect(route('contracts.index'))->with('message', 'Contrato alterado com sucesso ');
    }


    public function destroy(Contract $contract)
    {
        $contract->delete();

        return redirect(route('contracts.index'))->with('message', 'Contrato apagado com sucesso!');
    }
}
