<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function index()
    {
        $links = DB::table('role_has_permissions')
            ->join('roles', 'roles.id', '=', 'role_has_permissions.role_id')
            ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->select('roles.id as role_id', 'roles.name as role_name',
                     'permissions.id as permission_id', 'permissions.name as permission_name')
            ->get();

        return view('role-permissions.index', compact('links'));
    }

    public function create()
    {
        return view('role-permissions.create', [
            'roles' => Role::all(),
            'permissions' => Permission::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permission_id' => 'required|exists:permissions,id',
        ]);

        Role::findOrFail($request->role_id)
            ->givePermissionTo(Permission::findOrFail($request->permission_id));

        return redirect()->route('role-permissions.index')->with('success', 'Permission linked to role.');
    }

    public function destroy($role, $permission)
    {
        Role::findOrFail($role)->revokePermissionTo(Permission::findOrFail($permission));

        return redirect()->route('role-permissions.index')->with('success', 'Link removed.');
    }
}