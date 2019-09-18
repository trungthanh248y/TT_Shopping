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
            $bill_Detail[$bill->id]['nameUser'] = User::find(Bill::find($bill->id_bill)['id_user'])['name'];
            $bill_Detail[$bill->id]['nameProduct'] = Product::find($bill->id_product)['name'];
            $bill_Detail[$bill->id]['totalBill'] = Bill::find($bill->id_bill)['total'];
            $bill_Detail[$bill->id]['paymentBill'] = Bill::find($bill->id_bill)['payment'];
            $bill_Detail[$bill->id]['statusBill'] = Bill::find($bill->id_bill)['status'];
            $bill_Detail[$bill->id]['quantity'] = $bill->quantity;
            $bill_Detail[$bill->id]['created_at'] = $bill->created_at;
        }
        return view('bills.home', compact('bills', 'bill_Detail'));
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
