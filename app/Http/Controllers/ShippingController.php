<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function show ()
    {
        return view('User/Shipping/shippingForm');
    }

    public function edit (Request $shipping) {
        
    }
}
