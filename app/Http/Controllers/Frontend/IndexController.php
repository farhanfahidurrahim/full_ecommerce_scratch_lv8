<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DB;

class IndexController extends Controller
{
    public function Index()
    {   
        $category=Category::all();
        $bannerproduct=Product::where('product_slider',1)->latest()->first();
        //$bannerproduct=DB::table('products')->where('product_slider',1)->latest->first();
        return view('frontend.front_index',compact('category','bannerproduct'));
    }

    //Single Product Show
    public function productDetails($slug)
    {
        $product=Product::where('slug',$slug)->first();
        return view('frontend.product_details',compact('product'));
    }
}
