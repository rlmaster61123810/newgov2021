<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        $attendees = Attendee::all();
        return view('attendees.index', compact('attendees'));
    }
    // create
    public function create()
    {
        $forms = \App\Models\Form::all();
        $attendeeDetails = \App\Models\AttendeeDetail::all();
        return view('attendees.create', ['forms' => $forms, 'attendeeDetails' => $attendeeDetails]);
    }
    // store
    public function store(Request $request)
    {
        $request->validate([
            'form_id' => 'required',
            'type' => 'required',
            'attendee_detail.*' => 'required',
            'attendee_detail.*.fullname' => 'required|min:3',
            'attendee_detail.*.phone' => 'required|min:7',
        ]);
        $attendee = new Attendee;
        $attendee->form_id = $request->form_id;
        $attendee->type = $request->type;
        $attendee->save();

    // attendee
        $attendee = $attendee->details()->create([
            'form_id' => $request->form_id,
            'type' => $request->type,
        ]);
    }
    // edit
    public function edit($id)
    {
        $attendee = Attendee::find($id);
        $forms = \App\Models\Form::all();
        $attendeeDetails = \App\Models\AttendeeDetail::all();
        return view('attendees.edit', ['attendee' => $attendee, 'forms' => $forms, 'attendeeDetails' => $attendeeDetails]);
    }

    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'form_id' => 'required',
            'type' => 'required',
            'attendee_detail.*' => 'required',
            'attendee_detail.*.fullname' => 'required|min:3',
            'attendee_detail.*.phone' => 'required|min:7',
        ]);
        $attendee = Attendee::find($id);
        $attendee->form_id = $request->form_id;
        $attendee->type = $request->type;
        $attendee->save();
        return redirect('/attendees')->with('success', 'Attendee has been updated');
    }
    // show
    public function show($id)
    {
        $attendee = Attendee::find($id);
        $forms = \App\Models\Form::all();
        $attendeeDetails = \App\Models\AttendeeDetail::all();
        return view('attendees.show', ['attendee' => $attendee, 'forms' => $forms, 'attendeeDetails' => $attendeeDetails]);
    }
    // destroy
    public function destroy($id)
    {
        $attendee = Attendee::find($id);
        $attendee->delete();
        return redirect('attendees.index')->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }




}
