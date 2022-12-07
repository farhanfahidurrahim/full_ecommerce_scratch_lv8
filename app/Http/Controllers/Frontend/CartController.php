<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use DB;

class CartController extends Controller
{   
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
            'options'=>['size'=>$request->size, 'color'=>$request->color, 'thumbnail'=>$request->thumbnail]
        ]);

        return response()->json("Add to cart success");
    }

    //All Cart
    public function allCart()
    {
        $data=array();
        $data['cart_qty']=Cart::count();
        $data['cart_total']=Cart::total();
        return response()->json($data);
    }
}
