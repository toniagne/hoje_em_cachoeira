<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertsement;
use Illuminate\Http\Request;
use App\Http\Requests\AdvertsementRequest;
use App\Models\Application;

class AdvertisementsController extends Controller
{

    public function index()
    {
        $advertsements = Advertsement::all();
        return view('admin.advertsements.index', compact('advertsements'));
    }


    public function create()
    {
        $applications = Application::active()->orderBy('name')->get();
        return view('admin.advertsements.create', compact('applications'));
    }


    public function store(AdvertsementRequest $request)
    {
        // VALIDAÇÃO DO FORMULÁRIO
        $validated = $request->validated();

        // INSTANCIAMENTO DA CLASSE ELOQUENT
        $advertsements = new Advertsement();

        // CONVERSÃO DO CAMPO AMOUNT PARA MONETARY
        $request->amount = $advertsements->convertMonetary($request->vlr);


        // REGISTRA NA TABELA
        $save = Advertsement::create($request->all());

        $save->setApplications($request->application);

        return redirect(route('advertisements.index'))->with(['message'=>'Plano de negócio cadastrado com sucesso']);

    }


    public function show($id)
    {
        $advertsement = Advertsement::where('id', $id)->first();

        return view('admin.advertsements.show', compact('advertsement'));
    }


    public function edit($id)
    {
        $applications = Application::active()->orderBy('name')->get();
        $advertsement = Advertsement::where('id', $id)->first();

        return view('admin.advertsements.edit', compact('advertsement', 'applications'));
    }


    public function update(AdvertsementRequest $request, $id)
    {
        $advertsement = Advertsement::where('id', $id)->first();

        $request->validated();

        $request['amount'] = $advertsement->convertMonetary($request->amount);

        $advertsement->setApplications($request->application);

        $advertsement->update($request->all());

        return redirect(route('advertisements.index'))->with('message', 'Plano de negócio alterado com sucesso !');

    }


    public function destroy($id)
    {
        $advertsement = Advertsement::where('id', $id)->first();
        $advertsement->delete();
        return redirect(route('advertisements.index'))->with('message', 'Plano de negócio deletado com sucesso !');
    }
}
