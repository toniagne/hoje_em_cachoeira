<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Competitor;
use Illuminate\Http\Request;

class RafflesController extends Controller
{
    public function participate(Request $request, Client $client)
    {
       Competitor::create($request->all());

        return redirect(route('home.details', $client->slug))->with(['message'=>'Vocé esta participando da promoção.']);

    }
}
