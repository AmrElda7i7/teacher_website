<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:create_role')->only('create');
        $this->middleware('permission:delete_role')->only('destroy');
        $this->middleware('permission:update_role')->only('update');
    }
    public function index()
    {
        $groups= Group::all();
        return view('groups.groups',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'group_name'=>'required|unique:groups,name'
            ]
            );
        $role = Group::create([
            'name' => $request->group_name
        ]);
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $group= Group::where('id',$id)->first();
        return view('groups.update',compact('group'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate(
            [
                'group_name'=>'required|unique:groups,name,'.$id
            ]
            );
        Group::where('id',$id)->update([
            'name'=>$request->group_name
        ]);
        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Group::where('id',$id)->delete();
        return redirect()->back();
    }
}
