<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login () {
        return view('Auth/login');
    }

    public function register () {
        return view('Auth/register');
    }

    // New user registration
    public function registerpost (Request $request) {
        $formFields = $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required',
            'password' => 'required'
        ]);

        // Save the new user
        $user = new User();
        $user->name = $formFields['name'];
        $user->email = $formFields['email'];
        $user->password = Hash::make($formFields['password']);
        $user->save();
    }

    public function loginpost (Request $request) {
        $formFields = request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    }

    public function logout () {
        Session::flush();
        Auth::logout;
        redirect('/');
    }
}
