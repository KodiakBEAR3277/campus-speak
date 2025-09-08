<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->get();
        return view('usermanagement', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('usermanagement')->with('success', 'User deleted successfully');
    }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
        return redirect()->route('usermanagement')->with('success', 'User restored successfully');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => bcrypt($validated['password']),
        ]);
    
        return redirect()->route('usermanagement')->with('success', 'User created successfully');
    }
    
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);
    
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->username = $validated['username'];
        
        if ($validated['password']) {
            $user->password = bcrypt($validated['password']);
        }
    
        $user->save();
    
        return redirect()->route('usermanagement')->with('success', 'User updated successfully');
    }
}