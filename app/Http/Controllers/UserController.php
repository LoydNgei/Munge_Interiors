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

    public function loginpost () {

    }

    public function registerpost () {

    }

    public function logout () {

    }
}
