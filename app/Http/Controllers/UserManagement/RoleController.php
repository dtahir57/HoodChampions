<?php

namespace App\Http\Controllers\UserManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\RoleRequest;
use Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->get();
        return view('admin.UserManagement.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::latest()->get();
        return view('admin.UserManagement.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = new Role;
        $role->name = $request->name;
        $role->save();

        $role->givePermissionTo($request->permissions);
        if ($role) {
            Session::flash('created', 'New Role Created Successfully');
            return redirect()->route('role.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('admin.UserManagement.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        if (count($request->permissions) > 0) {
            $role->syncPermissions($request->permissions);
        } else {
            $role->revokePermissionTo(Permission::all());
        }
        $role->update();
        if ($role) {
            Session::flash('updated', 'Role Updated Successfully!');
            return redirect()->route('role.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleRequest $request)
    {
        $role = Role::find($request->id);
        $role->delete();
        if ($role) {
            Session::flash('deleted', 'Role Deleted Successfully');
            return redirect()->route('role.index');
        }
    }

    public function bulk_destroy(RoleRequest $request)
    {
        foreach($request->roles as $id)
        {
            $role = Role::findById($id);
            $role->delete();
        }
        Session::flash('bulk_destroy', 'Roles Removed Successfully');
        return redirect()->back();
    }
}
