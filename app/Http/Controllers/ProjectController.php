<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{

    // only authenticated users can access these methods
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', ['projects' => $projects]);
    }

    // create
    public function create()
    {

        return view('projects.create');
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
            //attachment max size 100mb
            'attachment' => 'max:100000'
        ]);

        $fileName = '';

        // if has attachment
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = $file->getClientOriginalName();
            // regex to remove special characters and spaces
            $fileName = preg_replace('/\s+/', '', $fileName);
            // random file name
            $fileName = time() . '-' . $fileName;
            // upload file
            $file->move(public_path('/uploads'), $fileName);
        }

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
        $project->attachment = $fileName;
        $project->save();

        return redirect('/projects')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }

    // show
    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show', ['project' => $project]);
    }
    // edit
    public function edit($id)
    {
        $project = Project::find($id);
        return view('projects.edit', ['project' => $project]);
    }
    // update
    // show pdf version
    public function showPdf($id)
    {

        // $project = Project::find($id);
        // $pdf = \PDF::loadView('project.showPdf', ['project' => $project]);
        // return $pdf->download('project.pdf');
    }

    // update
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
            'attachment' => 'max:100000'
        ]);




        $project = Project::find($id);

        $fileName = $project->attachment;

        // if has attachment
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = $file->getClientOriginalName();
            // regex to remove special characters and spaces
            $fileName = preg_replace('/\s+/', '', $fileName);
            // random file name
            $fileName = time() . '-' . $fileName;
            // upload file
            $file->move(public_path('/uploads'), $fileName);
        }


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
        $project->attachment = $fileName;
        $project->save();

        // redirect
        return redirect('/projects')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }


    // delete attachment
    public function destroyAttachment($id)
    {
        $project = Project::find($id);
        $fileName = $project->attachment;
        $filePath = public_path('/uploads/' . $fileName);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
        $project->attachment = '';
        $project->save();
        return redirect('/projects/' . $id . '/edit')->with('success', 'ลบไฟล์เรียบร้อย');
    }


    // delete
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/projects')->with('success', 'ลบข้อมูลเรียบร้อย');
    }
}
