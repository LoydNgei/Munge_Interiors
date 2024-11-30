<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function shop () {
        return view('User/pages/shop');
    }
    public function account () {
        return view('User/pages/account');
    }
    public function wishlist () {
        return view('User/pages/wishlist');
    }
    public function product () {
        return view('User/pages/product');
    }
    public function checkout () {
        return view('User/pages/checkout');
    }
}
