<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\BillEntry;
use App\Utils\Bills;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BillsController extends Controller
{
    public function bill(BillEntry $billEntry, Request $request)
    {
        $arguments = [
            'due' => $this->parseDateBD($request->due),
            'amount' => number_format($request->value, '2', '.', ',')
        ];


        $createBillBillet = new Bills($billEntry);

        if ($billEntry->bill()->count() <= 0){

            return $createBillBillet->create_billet($arguments);

        } else {

            return $createBillBillet->create_billet($arguments, true);
            //return response()->json($billEntry->bill()->first());
            
        }


    }

    public function parseDateBD($date){
        return Carbon::createFromFormat('d/m/Y', $date)->format('m/d/Y');
    }
}
