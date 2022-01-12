<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index communities
    public function index()
    {
        $communities = Community::all();
        return view('communities.index', compact('communities'));
    }
    // create community
    public function create()
    {
        return view('communities.create');
    }
    // store community to database
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:communities',
            'village' => 'required',
            'moo' => 'required',
            'district' => 'required',
            'sub_district' => 'required',
        ]);
        $community = new Community;
        $community->code = $request->code;
        $community->village = $request->village;
        $community->moo = $request->moo;
        $community->district = $request->district;
        $community->sub_district = $request->sub_district;
        $community->save();
        return redirect('/communities')->with('success', 'บันทึกข้อมูลสำเร็จ');
    }
    // edit community
    public function edit($id)
    {
        $community = Community::find($id);
        return view('communities.edit', compact('community'));
    }
    // update community
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'village' => 'required',
            'moo' => 'required',
            'district' => 'required',
            'sub_district' => 'required',
        ]);
        $community = Community::find($id);
        $community->code = $request->code;
        $community->village = $request->village;
        $community->moo = $request->moo;
        $community->district = $request->district;
        $community->sub_district = $request->sub_district;
        $community->save();
        return redirect('/communities')->with('success', 'บันทึกข้อมูลสำเร็จ');
    }
    // show
    public function show($id)
    {
        $community = Community::find($id);
        return view('communities.show', compact('community'));
    }
    // delete community
    public function destroy($id)
    {
        $community = Community::find($id);
        $community->delete();
        return redirect('/communities')->with('success', 'ลบข้อมูลสำเร็จ');
    }




}
