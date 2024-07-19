<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function shop () {
        return view('pages/shop');
    }
    public function account () {
        return view('pages/account');
    }
    public function wishlist () {
        return view('pages/wishlist');
    }
    public function product () {
        return view('pages/product');
    }
    public function checkout () {
        return view('pages/checkout');
    }
}
