<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BillEntry;
use App\Models\Contract;
use Illuminate\Http\Request;

class ReceiveController extends Controller
{

    public function index()
    {
        $entries = BillEntry::whereBetween('due', array(now()->startOfMonth(), now()->endOfMonth()))->get();
        return view('bills.receives.index', compact('entries'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function bills(){
        $bills = new BillEntry();

        $contracts = Contract::where('total', '>', 0)->get();

        $bills->setEntry($contracts);
    }

    public function billOverdue(){
        $bills = BillEntry::whereRaw('due < now()')->where('status', 'pendent')->get();

        foreach ($bills as $bill){
            $bill->update(['status'=>'overdue']);
        }
    }
}
