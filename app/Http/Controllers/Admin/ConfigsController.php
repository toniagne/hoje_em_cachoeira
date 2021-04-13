<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigsController extends Controller
{

    public function index()
    {
        $configs = Config::all();
        return view('admin.configs.index', compact('configs'));
    }


    public function create()
    {
        return view('admin.configs.create');
    }


    public function store(Request $request)
    {
        $configs = new Config();

        if ($request->hasFile('file_slide')) {
            $request['slides'] = $configs->sendFile($request->file('file_slide'));
        }
        if ($request->hasFile('file_logo')) {
            $request['logo'] = $configs->sendFile($request->file('file_logo'));
        }

        $configs->create($request->all());

        return redirect(route('configs.index'))->with(['message'=>'Configuração cadastrada com sucesso']);
    }


    public function show($id)
    {
        //
    }


    public function edit(Config $config)
    {
        return view('admin.configs.edit', compact('config'));
    }


    public function update(Request $request, Config $config)
    {
        if ($request->hasFile('file_slide')) {
            $request['slides'] = $config->sendFile($request->file('file_slide'));
        }
        if ($request->hasFile('file_logo')) {
            $request['logo'] = $config->sendFile($request->file('file_logo'));
        }

        $config->update($request->all());

        return redirect(route('configs.index'))->with(['message'=>'Configuração alterada com sucesso']);
    }


    public function destroy($id)
    {
        //
    }
}
