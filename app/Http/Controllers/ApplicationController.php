<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        $applications = Application::all();
        return view('applications.index', ['applications' => $applications]);
    }
    // create
    public function create()
    {
        return view('applications.create');
    }
    // store
    public function store(Request $request)
    {
        $request->validate([
            'has_idcard' => 'required',
            'has_house_registration' => 'required',
            'has_document' => 'required',
            'group_name' => 'required',
            'product_type' => 'required',
            'reason' => 'required',
            'fullname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'shop_address' => 'required',
            'shop_name' => 'required',
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

        $application = new Application();
        $application->has_idcard = $request->has_idcard;
        $application->has_house_registration = $request->has_house_registration;
        $application->has_document = $request->has_document;
        $application->group_name = $request->group_name;
        $application->product_type = $request->product_type;
        $application->reason = $request->reason;
        $application->fullname = $request->fullname;
        $application->address = $request->address;
        $application->phone = $request->phone;
        $application->shop_address = $request->shop_address;
        $application->shop_name = $request->shop_name;
        $application->attachment = $fileName;
        $application->save();

        return redirect('/applications')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
    // show
    public function show($id)
    {
        $application = Application::find($id);
        return view('applications.show', ['application' => $application]);
    }
    // edit
    public function edit($id)
    {
        $application = Application::find($id);
        return view('applications.edit', ['application' => $application]);
    }
    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'has_idcard' => 'required',
            'has_house_registration' => 'required',
            'has_document' => 'required',
            'group_name' => 'required',
            'product_type' => 'required',
            'reason' => 'required',
            'fullname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'shop_address' => 'required',
            'shop_name' => 'required',
            //attachment max size 100mb
            'attachment' => 'max:100000'
        ]);

        $application = Application::find($id);

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

        $application = Application::find($id);
        $application->has_idcard = $request->has_idcard;
        $application->has_house_registration = $request->has_house_registration;
        $application->has_document = $request->has_document;
        $application->group_name = $request->group_name;
        $application->product_type = $request->product_type;
        $application->reason = $request->reason;
        $application->fullname = $request->fullname;
        $application->address = $request->address;
        $application->phone = $request->phone;
        $application->shop_address = $request->shop_address;
        $application->shop_name = $request->shop_name;
        $application->attachment = $fileName;
        $application->save();
        // redirect
        return redirect('/applications')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
    // delete attachment
    public function deleteAttachment($id)
    {
        $application = Application::find($id);
        $fileName = $application->attachment;
        $filePath = public_path('/uploads/' . $fileName);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $application->attachment = '';
        $application->save();
        return redirect('/applications/' . $id)->with('success', 'ลบไฟล์เรียบร้อย');
    }
    // delete
    public function destroy($id)
    {
        $application = Application::find($id);
        $application->delete();
        return redirect('/applications')->with('success', 'ลบข้อมูลเรียบร้อย');
    }
}
