<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:create_admin')->only('create');
        $this->middleware('permission:view_admins')->only(['index','view']);
        $this->middleware('permission:delete_admin')->only('destroy');
        $this->middleware('permission:update_admin')->only('update');

    }
    public function index()
    {
        $users=User::all();
        return view('admins.admins',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $roles= Role::where('name','admin')->first();
    
        return view('admins.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $user=  User::create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>hash::make($request->password),
            ]
            );
            $user->assignRole($request->role);
            return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::where('id',$id)->first();
        return view('admins.update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        User::where('id',$id)->update(
            [
                'name'=>$request->name,
                'email'=>$request->email,
            ]
            );
            return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id',$id)->delete();
        return redirect()->back();
    }
}
