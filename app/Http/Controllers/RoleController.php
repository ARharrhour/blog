<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.authorization.roles.index', ['roles' => Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Role::create(["name" => $request()->get('role'), 'slug' => Str::slug($request()->get('role'), '-')]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view('admin.authorization.roles.index', ['roles' => Role::all(), 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role)
    {
        //
        $roleUpdate = Role::find($role);
        $roleUpdate->name = $request->get('role_edit');
        $roleUpdate->slug = Str::slug($request->get('role_edit'), '-');
        $roleUpdate->save();
        return redirect()->route('index.roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
    public function delete($role)
    {
        Role::find($role)->delete();
        return back();
    }
    public function rolePermissions($role)
    {

        return view('admin.authorization.roles.role_permissions', ['role' => Role::find($role), 'permissions' => Permission::all()]);
    }
    public function rolePermissionsAttach($permission, $role)
    {
        Role::find($role)->permissions()->attach($permission);
        return back();
    }
    public function rolePermissionsDetach($permission, $role)
    {
        Role::find($role)->permissions()->detach($permission);
        return back();
    }
    
}
