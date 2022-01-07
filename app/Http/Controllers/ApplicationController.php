<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // index Application
    public function index()
    {
        $applications = Application::all();
        return view('applications.index', ['applications' => $applications]);
    }
    // create Application
    public function create()
    {
        return view('applications.create');
    }
    // store Application
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'department' => 'required',
            'location' => 'required',
            'deadline' => 'required',
            'officer' => 'required',
            'training_start' => 'required',
            'training_end' => 'required',
            'register_details' => 'required',
            'result' => 'required',
            'kpi' => 'required',
            'kpi_unit' => 'required',
            'budget' => 'required',
            'disbursement' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'comment' => 'required',
            'attachment' => 'required',
        ]);

        $application = new Application();
        $application->name = $request->name;
        $application->description = $request->description;
        $application->department = $request->department;
        $application->location = $request->location;
        $application->deadline = $request->deadline;
        $application->officer = $request->officer;
        $application->training_start = $request->training_start;
        $application->training_end = $request->training_end;
        $application->register_details = $request->register_details;
        $application->result = $request->result;
        $application->kpi = $request->kpi;
        $application->kpi_unit = $request->kpi_unit;
        $application->budget = $request->budget;
        $application->disbursement = $request->disbursement;
        $application->start_date = $request->start_date;
        $application->end_date = $request->end_date;
        $application->comment = $request->comment;
        $application->attachment = $request->attachment;
        $application->save();

        return redirect('/applications');
    }
    // show Application
    public function show($id)
    {
        $application = Application::find($id);
        return view('applications.show', ['application' => $application]);
    }
    // edit Application
    public function edit($id)
    {
        $application = Application::find($id);
        return view('applications.edit', ['application' => $application]);
    }
    // update Application
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'department' => 'required',
            'location' => 'required',
            'deadline' => 'required',
            'officer' => 'required',
            'training_start' => 'required',
            'training_end' => 'required',
            'register_details' => 'required',
            'result' => 'required',
            'kpi' => 'required',
            'kpi_unit' => 'required',
            'budget' => 'required',
            'disbursement' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'comment' => 'required',
            'attachment' => 'required',
        ]);

        $application = Application::find($id);
        $application->name = $request->name;
        $application->description = $request->description;
        $application->department = $request->department;
        $application->location = $request->location;
        $application->deadline = $request->deadline;
        $application->officer = $request->officer;
        $application->training_start = $request->training_start;
        $application->training_end = $request->training_end;
        $application->register_details = $request->register_details;
        $application->result = $request->result;
        $application->kpi = $request->kpi;
        $application->kpi_unit = $request->kpi_unit;
        $application->budget = $request->budget;
        $application->disbursement = $request->disbursement;
        $application->start_date = $request->start_date;
        $application->end_date = $request->end_date;
        $application->comment = $request->comment;
        $application->attachment = $request->attachment;
        $application->save();

        return redirect('/applications');
    }
    // destroy Application
    public function destroy($id)
    {
        $application = Application::find($id);
        $application->delete();
        return redirect('/applications');
    }



}
