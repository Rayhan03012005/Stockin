<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        if (session('role') != 'admin') {
            return redirect()->route('login');
        }

        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function create()
    {
        if (session('role') != 'admin') {
            return redirect()->route('login');
        }
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        if (session('role') != 'admin') {
            return redirect()->route('login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,owner,peminjam',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            Profile::create(['user_id' => $user->id]);
        });

        return redirect()->route('admin.dashboard')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        if (session('role') != 'admin') {
            return redirect()->route('login');
        }

        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if (session('role') != 'admin') {
            return redirect()->route('login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,owner,peminjam',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        if (session('role') != 'admin') {
            return redirect()->route('login');
        }

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
    }
}