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
        return view('attendees.index', ['attendees' => $attendees]);
    }
    // create
    public function create()
    {
        return view('attendees.create');
    }
    // store
    public function store(Request $request)
    {
        $attendee = new Attendee();
        $attendee->form_id = $request->form_id;
        $attendee->type = $request->type;
        $attendee->save();
        return redirect('/attendees');
    }
    // show
    public function show(Attendee $attendee)
    {
        return view('attendees.show', ['attendee' => $attendee]);
    }
    // edit
    public function edit(Attendee $attendee)
    {
        return view('attendees.edit', ['attendee' => $attendee]);
    }
    // update
    public function update(Request $request, Attendee $attendee)
    {
        $attendee->form_id = $request->form_id;
        $attendee->type = $request->type;
        $attendee->save();
        return redirect('/attendees');
    }
    // destroy
    public function destroy(Attendee $attendee)
    {
        $attendee->delete();
        return redirect('/attendees');
    }



}
