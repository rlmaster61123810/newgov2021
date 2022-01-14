<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Approval;
use App\Models\SaleArea;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        $applications = Application::whereNotIn('id', function ($query) {
            $query->select('application_id')->from('approvals');
        })->get();
        $rejects = Approval::where('status', 'rejected')->get();
        $approves = Approval::where('status', 'approved')->get();
        return view('approvals.index', ['applications' => $applications, 'rejects' => $rejects, 'approves' => $approves]);
    }
    // create
    public function create($id)
    {
        $application = Application::find($id);

        // sale area where sale_area_id is not in approval table
        $sale_areas = SaleArea::whereNotIn('id', function ($query) {
            $query->select('sale_area_id')->from('approvals');
        })->get();

        return view('approvals.create', ['sale_areas' => $sale_areas, 'application' => $application]);
    }

    public function editApplication($id)
    {
        $application = Application::find($id);
        return view('approvals.application_edit', ['application' => $application]);
    }

    public function updateApplication(Request $request, $id)
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
        $application->save();

        $products = $request->products;
        $application->products()->delete();
        foreach ($products as $product) {
            $application->products()->insert([
                'application_id' => $application->id,
                'name' => $product,
            ]);
        }

        return redirect()->route('approvals.index');
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'application_id' => 'required',
            'status' => 'required|in:approved,rejected',
            'comment' => 'required_if:status,rejected',
        ]);

        $approval = new Approval;
        $approval->application_id = $request->application_id;
        $approval->status = $request->status;
        $approval->user_id = auth()->user()->id;
        $approval->sale_area_id = $request->sale_area_id;
        $approval->comment = $request->comment;

        $approval->save();
        return redirect('/approvals')->with('success', 'Approval created successfully');
    }
    // checkbox paid
    public function paid(Request $request)
    {
        $approval = Approval::find($request->id);
        $approval->paid = $request->paid;
        $approval->save();
        return redirect('/approvals')->with('success', 'Approval updated successfully');
    }


    // edit
    public function edit($id)
    {
        $approval = Approval::find($id);
        $users = \App\Models\User::all();
        $sale_areas = \App\Models\SaleArea::all();
        $applications = \App\Models\Application::all();
        return view('approvals.edit', ['approval' => $approval, 'users' => $users, 'sale_areas' => $sale_areas, 'applications' => $applications]);
    }
    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'application_id' => 'required',
            'user_id' => 'required',
            'sale_area_id' => 'required',
            'comment' => 'required',

        ]);
        $approval = Approval::find($id);
        $approval->application_id = $request->application_id;
        $approval->user_id = $request->user_id;
        $approval->sale_area_id = $request->sale_area_id;
        $approval->comment = $request->comment;
        $approval->save();

        return redirect()->route('approvals.index')->with('success', 'Data berhasil diubah');
    }

    // show
    public function show($id)
    {
        $approval = Approval::find($id);
        $users = \App\Models\User::all();
        $sale_areas = \App\Models\SaleArea::all();
        $applications = \App\Models\Application::all();
        return view('approvals.show', ['approval' => $approval, 'users' => $users, 'sale_areas' => $sale_areas, 'applications' => $applications]);
    }
    // destroy
    public function destroy($id)
    {
        $approval = Approval::find($id);
        $approval->delete();
        return redirect()->route('approvals.index');
    }
}
