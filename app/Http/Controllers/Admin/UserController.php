<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function assignRole(Request $request,  User $user)
    {

        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role already exists for this user');
        }

        $user->assignRole($request->role);

        return back()->with('message', 'Role assigned');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole('admin')) {
            return back()->with('message', 'You are admin');
        }
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed from user');
        }

        return back()->with('message', 'Role does not exist');
    }

    public function givePermission(Request $request, User $user)
    {
        //dd($request);

        //  Validate
        $validated = $request->validate([
            'permission' => 'required'
        ]);

        //  First check if this role already has this permission assigned
        //  otherwise we don't assign it twice
        if ($user->hasPermissionTo($request->permission)) {
            //  If this permission is already assigned
            //  Return with a message
            return back()->with('message', 'Permission already exists for this user');
        }

        //  If the Role does not have this permission
        //  Then we assign the requested permission
        $user->givePermissionTo($request->permission);

        //  Return with a success message
        return back()->with('message', 'Permission assigned successfully');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        //  First check if this role has this permission assigned
        //  If this Role does have this permission assigned, then we can delete it
        if ($user->hasPermissionTo($permission)) {
            //  If this permission is assigned
            $user->revokePermissionTo($permission);

            //  Return with a success message
            return back()->with('message', 'Permission revoked');
        }
        //  If the permission does not exist for this role
        //  This is kinda unlikely since the permission would not be listed in the first place
        return back()->with('message', 'Permission does not exist');
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {
            return back()->with('message', 'You are admin');
        }
        $user->delete();
        return back()->with('message', 'User deleted');
    }
}
