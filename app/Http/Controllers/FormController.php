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
        return view('forms.create');
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
        ]);
        $form = new Form;
        $form->project_id = $request->project_id;
        $form->community_id = $request->community_id;
        $form->auditor_name = $request->auditor_name;
        $form->auditor_position = $request->auditor_position;
        $form->auditor_phone = $request->auditor_phone;
        $form->save();
        return redirect('/forms')->with('success', 'บันทึกข้อมูลสำเร็จ');
    }
    // edit
    public function edit($id)
    {
        $form = Form::find($id);
        return view('forms.edit', compact('form'));
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
        return view('forms.show', compact('form'));
    }
    // destroy
    public function destroy($id)
    {
        $form = Form::find($id);
        $form->delete();
        return redirect('/forms')->with('success', 'ลบข้อมูลสำเร็จ');
    }
}
