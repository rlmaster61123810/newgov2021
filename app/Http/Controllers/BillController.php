<?php

namespace App\Http\Controllers;

use App\Models\Approval;
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
        $approvals = Approval::whereNotNull('sale_area_id')
            ->whereNotIn('id', function ($query) {
                $query->select('approval_id')
                    ->from('bills');
            })
            ->get();
        return view('bills.create', ['approvals' => $approvals]);
    }
    // store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'approval_id' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
            'paid' => 'required',
        ]);

        $bill = new Bill;
        $bill->name = $request->name;
        $bill->approval_id = $request->approval_id;
        $bill->user_id = auth()->user()->id;
        $bill->price = $request->price;
        $bill->amount = $request->amount;
        $bill->paid = $request->paid;
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
            'name' => 'required',
            'approval_id' => 'required',
            'user_id' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
        ]);
        $bill = Bill::find($id);
        $bill->name = $request->name;
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
