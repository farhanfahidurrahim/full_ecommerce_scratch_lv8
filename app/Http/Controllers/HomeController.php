<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $orders=DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->take(10)->get();

        $total_order=DB::table('orders')->where('user_id',Auth::id())->count();//--> Total Order
        $complete_order=DB::table('orders')->where('user_id',Auth::id())->where('status',3)->count();//--> Complete Order
        $cancel_order=DB::table('orders')->where('user_id',Auth::id())->where('status',5)->count();//--> Cancel Order
        $return_order=DB::table('orders')->where('user_id',Auth::id())->where('status',4)->count();//--> Return Order
        return view('home',compact('orders','total_order','complete_order','cancel_order','return_order'));
    }

    //Logout customer
    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
    
}
