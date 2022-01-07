<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // index
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', ['projects' => $projects]);
    }

    // create
    public function create()
    {
        return view('project.create');
    }

    // store
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

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->department = $request->department;
        $project->location = $request->location;
        $project->deadline = $request->deadline;
        $project->officer = $request->officer;
        $project->training_start = $request->training_start;
        $project->training_end = $request->training_end;
        $project->register_details = $request->register_details;
        $project->result = $request->result;
        $project->kpi = $request->kpi;
        $project->kpi_unit = $request->kpi_unit;
        $project->budget = $request->budget;
        $project->disbursement = $request->disbursement;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->comment = $request->comment;
        $project->attachment = $request->attachment;
        $project->save();

        return redirect('/project')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }

    // show
    public function show($id)
    {
        $project = Project::find($id);
        return view('project.show', ['project' => $project]);
    }

    // show pdf version
    public function showPdf($id)
    {

        // $project = Project::find($id);
        // $pdf = \PDF::loadView('project.showPdf', ['project' => $project]);
        // return $pdf->download('project.pdf');
    }
    // delete
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/project')->with('success', 'ลบข้อมูลเรียบร้อย');
    }

}
