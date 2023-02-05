<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeReview(Request $request)
    {
        $request->validate([
            'rating'=>'required',
            'review'=>'required',
        ]);

        $check=DB::table('reviews')->where('user_id',Auth::id())->where('product_id',$request->product_id)->first();
        if ($check) {
            $notification=array('messege' => 'Already you review this product!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $data=array();
        $data['user_id']=Auth::id();
        $data['product_id']=$request->product_id;
        $data['review']=$request->review;
        $data['rating']=$request->rating;
        $data['review_date']=date('d-m-Y');

        DB::table('reviews')->insert($data);

        $notification=array('messege' => 'Thank you for your review!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    } 
}
