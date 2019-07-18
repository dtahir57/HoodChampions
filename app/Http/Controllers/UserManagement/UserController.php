<?php

namespace App\Http\Controllers\UserManagement;

use App\Exports\UserManagementExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::role(Role::all())->where('is_admin', 1)->get();
        return view('admin.UserManagement.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::latest()->get();
        return view('admin.UserManagement.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->is_admin = 1;
        $user->save();

        foreach($request->roles as $role) {
            $user->assignRole($role);
        }
        if ($user) {
            Session::flash('created', 'New User Created Successfully');
            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.UserManagement.user.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::latest()->get();
        return view('admin.UserManagement.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->update();

        $user->syncRoles($request->roles);
        if ($user) {
            Session::flash('updated', 'User Information Updated Successfully');
            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRequest $request)
    {
        $user = User::find($request->id);
        $user->delete();
        if ($user) {
            Session::flash('deleted', 'User Account Deleted Permanently');
            return redirect()->route('user.index');
        }
    }

    public function bulk_destroy(UserRequest $request)
    {
        foreach($request->users as $id)
        {
            $user = User::findById($id);
            $user->delete();
        }
        Session::flash('bulk_destroy', 'Users Removed Successfully');
        return redirect()->back();
    }

    public function export() 
    {
        return Excel::download(new UserManagementExport, 'users.xlsx');
    }
}
