<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session('user_id')) {
            return $this->redirectByRole();//Jika user sudah login (session user_id ada), arahkan ke halaman sesuai role.
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_id' => $user->id, 'role' => $user->role]);
            return $this->redirectByRole();
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegister()
    {
        if (session('user_id')) {
            return $this->redirectByRole();
        }
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:owner,peminjam',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            Profile::create(['user_id' => $user->id]);

            session([
                'user_id' => $user->id,
                'role' => $user->role,
                'user_name' => $user->name
            ]);
        });

        return $this->redirectByRole();
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }

    private function redirectByRole()
    {
        $role = session('role');
        if ($role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role == 'owner') {
            return redirect()->route('owner.items');
        } else {
            return redirect()->route('peminjam.items');
        }
    }
}