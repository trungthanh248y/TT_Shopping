<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bill_Detail;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill_Detail::all();
        foreach ($bills as $bill) {
            $nameUser = User::find(Bill::find($bill->id_bill)->id_user)['name'];
            $nameProduct = Product::find($bill->id_product)['name'];
            $totalBill = Bill::find($bill->id_bill)->total;
            $paymentBill = Bill::find($bill->id_bill)->payment;
            $statusBill = Bill::find($bill->id_bill)->status;
        }

        return view('bills.home', compact('bills', 'nameUser', 'nameProduct',
            'totalBill', 'paymentBill', 'statusBill'));
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
