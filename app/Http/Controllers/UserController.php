<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Session;
use Socialite;


class UserController extends Controller
{
    // View Login Page
    public function login () {
        return view('Auth/login');
    }

    // View Register Page
    public function register () {
        return view('Auth/register');
    }

    // New User Registration

    public function postregister (Request $request) {
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

        if (!$user) {
            return back()->withErrors('Registration failed, try again!');
        }
        return redirect()->route('login')->with('message', 'User registered successfully');
    }

    // Login User

    public function postlogin (Request $request) {
        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($formFields)) {
            return redirect('/');
        }
        return redirect('/login')->withErrors('Invalid credentials');
    }

    // User Logout

    public function logout () {
        Session::flush();
        Auth::logout;
        return redirect('/');
    }

    // Redirect to Google for Authentication
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    // Handle Google callback
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = user::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(str_random(16)),
            ]);
        }

        Auth::login($user);
        return redirect()->route('/');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();
        $User = User::where('email', $facebookUser->getEmail())->first();

        if(!$user) {
            $user = User::create([
                'name' => $facebookUser->getName(),
                'email' => $facebookUser->getEmail(),
                'password' => $bcrypt(str_random(16)),
            ]);
        }

        Auth::login($user);
        return redirect()->route('/');
    }
}
