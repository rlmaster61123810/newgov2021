<?php

namespace App\Http\Controllers;

use App\Models\AttendeeDetail;
use Illuminate\Http\Request;

class AttendeeDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        $attendee_details = AttendeeDetail::all();
        return view('attendee_details.index', ['attendee_details' => $attendee_details]);
    }
    // create
    public function create()
    {
        return view('attendee_details.create');
    }
    // store
    public function store(Request $request)
    {
        $attendee_detail = new AttendeeDetail;
        $attendee_detail->fullname = $request->fullname;
        $attendee_detail->phone = $request->phone;
        $attendee_detail->is_halal = $request->is_halal;
        $attendee_detail->save();
        return redirect('/attendee_details');
    }
    // show
    public function show($id)
    {
        $attendee_detail = AttendeeDetail::find($id);
        return view('attendee_details.show', ['attendee_detail' => $attendee_detail]);
    }
    // edit
    public function edit($id)
    {
        $attendee_detail = AttendeeDetail::find($id);
        return view('attendee_details.edit', ['attendee_detail' => $attendee_detail]);
    }
    // update
    public function update(Request $request, $id)
    {
        $attendee_detail = AttendeeDetail::find($id);
        $attendee_detail->fullname = $request->fullname;
        $attendee_detail->phone = $request->phone;
        $attendee_detail->is_halal = $request->is_halal;
        $attendee_detail->save();
        return redirect('/attendee_details');
    }
    // destroy
    public function destroy($id)
    {
        $attendee_detail = AttendeeDetail::find($id);
        $attendee_detail->delete();
        return redirect('/attendee_details');
    }











}
