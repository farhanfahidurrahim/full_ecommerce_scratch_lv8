<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use DB;

class IndexController extends Controller
{
    public function Index()
    {   
        $category=Category::all();
        $bannerproduct=Product::where('product_slider',1)->latest()->first();
        $featured=Product::where('status',1)->where('featured',1)->orderBy('id', 'DESC')->limit(8)->get();
        $popular_product=Product::where('status',1)->where('featured',1)->orderBy('id', 'DESC')->limit(15)->get();
        $trendy_product=Product::where('status',1)->where('trendy',1)->orderBy('id', 'DESC')->limit(8)->get();
        //$bannerproduct=DB::table('products')->where('product_slider',1)->latest->first();
        return view('frontend.front_index',compact('category','bannerproduct','featured','popular_product','trendy_product'));
    }

    //Single Product Show
    public function productDetails($slug)
    {
        $product=Product::where('slug',$slug)->first();
                 Product::where('slug',$slug)->increment('product_views');
        $related_product=DB::table('products')->where('subcategory_id',$product->subcategory_id)->orderBy('id','DESC')->take(10)->get();
        $review=Review::where('product_id',$product->id)->get();
        return view('frontend.product.product_details',compact('product','related_product','review'));
    }

    //Product Quick View
    public function ProductQuickView($id)
    {
        $product=Product::where('id',$id)->first();
        //return response()->json($product);
        return view('frontend.product.quick_view',compact('product'));
    }
}
