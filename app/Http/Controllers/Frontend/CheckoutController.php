<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Cart;

class CheckoutController extends Controller
{
    function Checkout()
    {   
        //Checkout page
        if (!Auth::check()) {

            $notification=array('messege' => 'Please Login your account', 'alert-type' => 'error'); 
            return redirect()->back()->with($notification);
        }

        $content=Cart::content();
        return view('frontend.cart.checkout',compact('content'));
    }
}
