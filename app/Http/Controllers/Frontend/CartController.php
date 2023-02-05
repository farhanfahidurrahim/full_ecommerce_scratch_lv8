<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use DB;
use Auth;

class CartController extends Controller
{   
    //All Cart
    public function allCart()
    {
        $data=array();
        $data['cart_qty']=Cart::count();
        $data['cart_total']=Cart::total();
        return response()->json($data);
    }

    public function myCart()
    {
        $content=Cart::content();
        return view('frontend.cart.my_cart',compact('content'));
    }

    //Add to cart QuickView
    public function AddToCartQV(Request $request)
    {   
        //3 Way to receive data from DataBase
        //$product=Product::find($request->id)->first();
        //$product=DB::table('products')->where('id',$request->id)->first();

        $product=Product::where('id',$request->id)->first();
        Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>$request->qty,
            'price'=>$request->price,
            'weight'=>'1',
            'options'=>['size'=>$request->size, 'color'=>$request->color, 'thumbnail'=>$product->thumbnail]
        ]);

        return response()->json("Add to cart success");
    }

    //Empty Cart
    public function emptyCart()
    {
        Cart::destroy();
        $notification=array('messege' => 'Cart item clear', 'alert-type' => 'success');
        return redirect()->to('/')->with($notification); 
    }

    //___Wishlist___
    public function addWishlist($id)
    {   
        if (Auth::check()) {
            $check=DB::table('wishlists')->where('product_id',$id)->where('user_id',Auth::id())->first();
            if ($check) {
                $notification=array('messege' => 'Already Its on your Wishlist!', 'alert-type' => 'error');
                return redirect()->back()->with($notification); 
            }else{
                $data=array();
                $data['product_id']=$id;
                $data['user_id']=Auth::id();
                $data['date']=date('d, F Y');

                DB::table('wishlists')->insert($data);
                $notification=array('messege' => 'Product Added On Youre Wishlist!', 'alert-type' => 'success');
                return redirect()->back()->with($notification);
            }
        }

        $notification=array('messege' => 'Please Login Your Account!', 'alert-type' => 'error');
        return redirect()->back()->with($notification);        
    }

    public function wishlist()
    {   
        if (Auth::check()) {
            $wishlist=DB::table('wishlists')
                        ->leftJoin('products','wishlists.product_id','products.id')
                        ->select('wishlists.*','products.name','products.thumbnail','products.slug')
                        ->where('wishlists.user_id',Auth::id())->get();

            return view('frontend.cart.wishlist',compact('wishlist'));
        }

        $notification=array('messege' => 'Product Added On Youre Wishlist!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function clearAllWishlist()
    {
        DB::table('wishlists')->where('user_id',Auth::id())->delete();
        $notification=array('messege' => 'Wishlist Clear!', 'alert-type' => 'error');
        return redirect()->back()->with($notification);
    }

    public function removeSingleWishlist($id)
    {
        DB::table('wishlists')->where('id',$id)->delete();
        $notification=array('messege' => 'Successfully Remove!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
