<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BillEntry;
use App\Models\Client;
use App\Models\Contract;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $contracts = Contract::all()->count();
        $clients = Client::all()->count();
        $entries = BillEntry::whereBetween('due', array(now()->startOfYear(), now()->endOfMonth()))->get();

        return view('admin.dash', compact('contracts', 'clients', 'entries'));
    }
}
