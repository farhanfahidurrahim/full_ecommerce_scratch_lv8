<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CheckoutController extends Controller
{
    function Checkout()
    {
        if (!Auth::check()) {

            $notification=array('messege' => 'Please Login your account', 'alert-type' => 'error'); 
            return redirect()->back()->with($notification);
        }
    }
}
