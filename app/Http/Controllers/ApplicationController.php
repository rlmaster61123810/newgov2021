<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        // applications where status is not approved in approval table
        $applications = Application::whereNotIn('id', function ($query) {
            $query->select('application_id')->from('approvals');
        })->orWhereHas('approvals', function ($query) {
            $query->where('status', '!=', 'approved');
        })->get();
        return view('applications.index', ['applications' => $applications]);
    }

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
            'group_name' => 'required_if:has_toggle,0',
            'product_type' => 'required',
            'reason' => 'required_if:has_produc_type,OTHER',
            'fullname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'shop_address' => 'required',
            'shop_name' => 'required',
            'products.*' => 'required',
        ]);

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
        $application->save();


        $products = $request->products;
        foreach ($products as $product) {
            $application->products()->insert([
                'application_id' => $application->id,
                'name' => $product,
            ]);
        }

        return redirect()->route('applications.index');
    }

    // checkbox has_idcard , has_house_registration ,has_document
    public function checkbox(Request $request)
    {
        $application = Application::find($request->id);
        $application->has_idcard = $request->has_idcard;
        $application->has_house_registration = $request->has_house_registration;
        $application->has_document = $request->has_document;
        $application->save();
        return redirect()->route('applications.index');
    }



    // show
    public function show(Application $application)
    {
        return view('applications.show', ['application' => $application]);
    }

    // download pdf
    public function pdf($id)
    {
        $application = Application::find($id);
        // return view('applications.pdf', ['application' => $application]);
        $pdf = Pdf::loadView('applications.pdf', ['application' => $application]);
        return $pdf->stream();
    }

    // edit
    public function edit(Application $application)
    {
        return view('applications.edit', ['application' => $application]);
    }
    // update
    public function update(Request $request, Application $application)
    {
        $request->validate([
            'has_idcard' => 'required',
            'has_house_registration' => 'required',
            'has_document' => 'required',
            'group_name' => 'required_if:has_toggle,0',
            'product_type' => 'required',
            'reason' => 'required_if:has_produc_type,OTHER',
            'fullname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'shop_address' => 'required',
            'shop_name' => 'required',
            'products.*' => 'required',
        ]);

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
        $application->save();

        $products = $request->products;
        $application->products()->delete();
        foreach ($products as $product) {
            $application->products()->insert([
                'application_id' => $application->id,
                'name' => $product,
            ]);
        }

        return redirect()->route('applications.index');
    }

    // destroy
    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('applications.index');
    }
}
