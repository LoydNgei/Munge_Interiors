<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    // Show register form if no admin exists
    public function register() {
        if (Admin::count() > 0) {
            return redirect()->route('admin.login')->withErrors('Admin already exists. Please log in!');
        }
        return view('Admin.Auth.register');
    }

    // Register only if no admin exists
    public function postRegister(Request $request) {
        if (Admin::count() > 0) {
            return redirect()->route('admin.login')->withErrors('Admin already exists. Please log in!');
        }
        // $request->validate([
        //     'username' => 'required|unique:admins',
        //     'password' => 'required|min:8|confirmed',
        // ]);

        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password,)
        ]);
        return redirect()->route('admin.login')->with('success', 'Admin registered successfully. Please log in!');
    }

    // Show login form
    public function showLoginForm() {
        return view('Admin.Auth.login');
    }

    // Handle login logic
    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if (!$admin) {
            return back()->withErrors('Username does not exist');
        }

        if (!Hash::check($request->password, $admin->password)) {
            return back()->withErrors('Incorrect password');
        }

        session()->put('admin_logged_in', true);
        return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully');
    }

    // Show admin Dashboard
    public function dashboard() {
        return view('Admin.dashboard');
    }

    public function logout() {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login')->with('success', 'Logged out successfully!');
    }

    // View all users by Admin
    public function index() {
        $users = User::all;
        return view('Admin.Users.index', compact(users));
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('admin.users.index')
                         ->with('success', 'User deleted successfully');
    }
}
