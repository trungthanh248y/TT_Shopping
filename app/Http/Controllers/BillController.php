<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::all();

        return view('bills.home', compact('bills'));
    }

    public function create()
    {

        return view('bills.add', compact('bills'));
    }

    public function store(Request $request)
    {
        $bill = new Bill();
        $bill->payment = $request->get('payment');
        $bill->status = $request->get('status');
        $bill->total = $request->get('total');
        $mess = "";
        if ($bill->save()) {
            $mess = "Success add new";
        }

        return view('bills.add', compact('bill'))->with('mess', $mess);
    }

    public function edit($id)
    {
        $bill = Bill::find($id);

        return view('bills.edit', compact('bill'));
    }

    public function update(Request $request, $id)
    {
        $bill = Bill::find($id);
        $bill->payment = $request->get('payment');
        $bill->status = $request->get('status');
        $bill->total = $request->get('total');
        $mess = "";
        if ($bill->save()) {
            $mess = "Success edit";
        }

        return view('bills.edit', compact('bill'))->with('mess', $mess);
    }

    public function delete(Request $request)
    {
        $bill = Bill::find($request->get('bill_id'));
        $bill->delete();
        return redirect()->route('indexBill')->with('mes_del', 'Delete success');
    }
}
