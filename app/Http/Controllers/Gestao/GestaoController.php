<?php

namespace App\Http\Controllers\Gestao;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:gestao');
    }

    public function index()
    {
        $client = Client::find(Auth::user()->id);
        return view('gestao.dashboard', compact('client'));
    }

    public function upload_banner(Request $request)
    {
        $client = Client::find(Auth::user()->id);

        $file = $request->attachments;

        $path = $file->store('attachments');

        $client->update([
            'ecommerce_image' => $path
        ]);

        return redirect(route('gestao.home'));
    }
}
