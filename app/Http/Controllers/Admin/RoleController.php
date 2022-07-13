<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'name' => 'required|min:3'
        ]);

        Role::create($validated);

        return to_route('admin.roles.index')->with('message', 'Role Created Successfully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|min:3'
        ]);

        $role->update($validated);

        return to_route('admin.roles.index')->with('message', 'Role Updated Successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('message', 'Role Deleted');
    }

    public function givePermission(Request $request, Role $role)
    {
        //dd($request);

        //  Validate
        $validated = $request->validate([
            'permission' => 'required'
        ]);

        //  First check if this role already has this permission assigned
        //  otherwise we don't assign it twice
        if ($role->hasPermissionTo($request->permission)) {
            //  If this permission is already assigned
            //  Return with a message
            return back()->with('message', 'Permission already exists for this Role');
        }

        //  If the Role does not have this permission
        //  Then we assign the requested permission
        $role->givePermissionTo($request->permission);

        //  Return with a success message
        return back()->with('message', 'Permission assigned successfully');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        //  First check if this role has this permission assigned
        //  If this Role does have this permission assigned, then we can delete it
        if ($role->hasPermissionTo($permission)) {
            //  If this permission is assigned
            $role->revokePermissionTo($permission);

            //  Return with a success message
            return back()->with('message', 'Permission revoked');
        }
        //  If the permission does not exist for this role
        //  This is kinda unlikely since the permission would not be listed in the first place
        return back()->with('message', 'Permission does not exist');
    }
}
