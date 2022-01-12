<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        $bills = Bill::all();
        return view('bills.index', ['bills' => $bills]);
    }
    // create
    public function create()
    {
        return view('bills.create');
    }
    // store
    public function store(Request $request)
    {
        $bill = new Bill();
        $bill->name = $request->name;
        $bill->approval_id = $request->approval_id;
        $bill->user_id = $request->user_id;
        $bill->price = $request->price;
        $bill->paid = $request->paid;
        $bill->amount = $request->amount;
        $bill->payment_method = $request->payment_method;
        $bill->comment = $request->comment;
        $bill->save();
        return redirect('/bills');
    }
    // show
    public function show(Bill $bill)
    {
        return view('bills.show', ['bill' => $bill]);
    }
    // edit
    public function edit(Bill $bill)
    {
        return view('bills.edit', ['bill' => $bill]);
    }
    // update
    public function update(Request $request, Bill $bill)
    {
        $bill->name = $request->name;
        $bill->approval_id = $request->approval_id;
        $bill->user_id = $request->user_id;
        $bill->price = $request->price;
        $bill->paid = $request->paid;
        $bill->amount = $request->amount;
        $bill->payment_method = $request->payment_method;
        $bill->comment = $request->comment;
        $bill->save();
        return redirect('/bills');
    }
    // destroy
    public function destroy(Bill $bill)
    {
        $bill->delete();
        return redirect('/bills');
    }



}
