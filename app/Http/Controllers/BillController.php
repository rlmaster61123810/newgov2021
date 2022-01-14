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
        return view('bills.index', compact('bills'));

    }
    // create
    public function create()
    {
        $bills = \App\Models\Bill::all();
        $approvals = \App\Models\Approval::all();
        $users = \App\Models\User::all();
        return view('bills.create', ['bills' => $bills, 'approvals' => $approvals, 'users' => $users]);
    }
    // store
    public function store(Request $request)
    {
        $request->validate([
            'approval_id' => 'required',
            'user_id' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
            'comment' => 'required',
        ]);
        $bill = new Bill;
        $bill->approval_id = $request->approval_id;
        $bill->user_id = $request->user_id;
        $bill->price = $request->price;
        $bill->amount = $request->amount;
        $bill->payment_method = $request->payment_method;
        $bill->comment = $request->comment;
        $bill->save();
        return redirect('/bills')->with('success', 'Bill created successfully');
    }
    // edit
    public function edit($id)
    {
        $bill = Bill::find($id);
        $approvals = \App\Models\Approval::all();
        $users = \App\Models\User::all();
        return view('bills.edit', ['bill' => $bill, 'approvals' => $approvals, 'users' => $users]);
    }
    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'approval_id' => 'required',
            'user_id' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
            'comment' => 'required',
        ]);
        $bill = Bill::find($id);
        $bill->approval_id = $request->approval_id;
        $bill->user_id = $request->user_id;
        $bill->price = $request->price;
        $bill->amount = $request->amount;
        $bill->payment_method = $request->payment_method;
        $bill->comment = $request->comment;
        $bill->save();
        return redirect('/bills')->with('success', 'Bill updated successfully');
    }
    // show
    public function show($id)
    {
        $bill = Bill::find($id);
        $approvals = \App\Models\Approval::all();
        $users = \App\Models\User::all();
        return view('bills.show', ['bill' => $bill, 'approvals' => $approvals, 'users' => $users]);
    }
    // destroy
    public function destroy($id)
    {
        $bill = Bill::find($id);
        $bill->delete();
        return redirect('/bills')->with('success', 'Bill deleted successfully');
    }











}
