<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ShowUsers()
    {
        return view('userslist');
    }

    public function ShowUserslist()
    {
        $users = User::all();
        $roles = Role::all();
        return view('userslist', compact('users', 'roles'));
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function updateRole(Request $request, $userId)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::find($userId);
        $user->update(['role_id' => $request->role_id]);

        return redirect()->back()->with('success', 'User role updated successfully.');
    }
}
