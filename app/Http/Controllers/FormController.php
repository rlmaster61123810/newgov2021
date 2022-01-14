<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        $forms = Form::all();
        return view('forms.index', compact('forms'));
    }
    // create
    public function create()
    {
        $projects = \App\Models\Project::all();
        $communities = \App\Models\Community::all();
        return view('forms.create', ['projects' => $projects, 'communities' => $communities]);
    }
    // store
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required',
            'community_id' => 'required',
            'auditor_name' => 'required',
            'auditor_position' => 'required',
            'auditor_phone' => 'required',
            'type' => 'required',
            'attendee_detail.*' => 'required',
            'attendee_detail.*.fullname' => 'required|min:3',
            'attendee_detail.*.phone' => 'required|min:7',
        ]);
        $form = new Form;
        $form->project_id = $request->project_id;
        $form->community_id = $request->community_id;
        $form->auditor_name = $request->auditor_name;
        $form->auditor_position = $request->auditor_position;
        $form->auditor_phone = $request->auditor_phone;
        $form->save();

        // attendee

        $attendee = $form->attendee()->create([
            'form_id' => $form->id,
            'type' => $request->type,
        ]);

        // attendee detail
        foreach ($request->attendee_detail as $key => $value) {
            $attendee->details()->create([
                'fullname' => $value['fullname'],
                'phone' => $value['phone'],
            ]);
        }

        return redirect()->route('forms.index')->with('success', 'Form has been created');
    }
    // edit
    public function edit($id)
    {
        $form = Form::find($id);
        $projects = \App\Models\Project::all();
        $communities = \App\Models\Community::all();
        return view('forms.edit', ['form' => $form, 'projects' => $projects, 'communities' => $communities]);
    }
    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'project_id' => 'required',
            'community_id' => 'required',
            'auditor_name' => 'required',
            'auditor_position' => 'required',
            'auditor_phone' => 'required',
        ]);
        $form = Form::find($id);
        $form->project_id = $request->project_id;
        $form->community_id = $request->community_id;
        $form->auditor_name = $request->auditor_name;
        $form->auditor_position = $request->auditor_position;
        $form->auditor_phone = $request->auditor_phone;
        $form->save();
        return redirect('/forms')->with('success', 'บันทึกข้อมูลสำเร็จ');
    }
    // show
    public function show($id)
    {
        $form = Form::find($id);
        $projects = \App\Models\Project::all();
        $communities = \App\Models\Community::all();
        return view('forms.show', ['form' => $form, 'projects' => $projects, 'communities' => $communities]);
    }

    // destroy
    public function destroy($id)
    {
        $form = Form::find($id);
        $form->delete();
        return redirect('/forms')->with('success', 'ลบข้อมูลสำเร็จ');
    }
}
