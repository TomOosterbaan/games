<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    public function index()
    {
        $links = DB::table('model_has_roles')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->join('users', 'users.id', '=', 'model_has_roles.model_id')
            ->where('model_has_roles.model_type', User::class)
            ->select('users.id as user_id', 'users.name as user_name',
                     'roles.id as role_id', 'roles.name as role_name')
            ->get();

        return view('user-roles.index', compact('links'));
    }

    public function create()
    {
        return view('user-roles.create', [
            'roles' => Role::all(),
            'users' => User::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'user_id' => 'required|exists:users,id',
        ]);

        User::findOrFail($request->user_id)->assignRole(Role::findOrFail($request->role_id));

        return redirect()->route('user-roles.index')->with('success', 'Role assigned to user.');
    }

    public function destroy($user, $role)
    {
        User::findOrFail($user)->removeRole(Role::findOrFail($role));

        return redirect()->route('user-roles.index')->with('success', 'Link removed.');
    }
}