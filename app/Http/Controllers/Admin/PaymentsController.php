<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentsRequest;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{

    public function index()
    {
        $payments = Payment::all();
        return view('admin.payments.index', compact('payments'));
    }


    public function create()
    {
        return view('admin.payments.create');
    }


    public function store(PaymentsRequest $request, Payment $payment)
    {
        $request->validated();

        $payment->create($request->all());

        return redirect(route('payments.index'))->with('message', 'Forma de pagamento adicionada com sucesso !');
    }

    public function edit(Payment $payment)
    {
        return view('admin.payments.edit', compact('payment'));
    }


    public function update(PaymentsRequest $request, Payment $payment)
    {
        $request->validated();

        $payment->update($request->all());

        return redirect(route('payments.index'))->with('message', 'Forma de pagamento editada com sucesso !');
    }


    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect(route('payments.index'))->with('message', 'Forma de pagamento deletada com sucesso !');
    }
}
