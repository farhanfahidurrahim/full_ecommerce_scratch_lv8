<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Auth;
use Image;
use App\Models\Product;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $imgurl='public/files/product';

            $product="";
                $query=DB::table('orders')->orderBy('id','DESC');

                if ($request->status==0) {
                    $query->where('status',0);
                }

                if ($request->status==1) {
                    $query->where('status',1);
                }

                if ($request->status==2) {
                    $query->where('status',2);
                }

                if ($request->status==3) {
                    $query->where('status',3);
                }

                if ($request->status==4) {
                    $query->where('status',4);
                }

                if ($request->status==5) {
                    $query->where('status',5);
                }

                if ($request->payment_type) {
                    $query->where('payment_type',$request->payment_type);
                }

                if ($request->date) {
                    $order_date=date('d-m-Y',strtotime($request->date));
                    $query->where('date',$order_date);
                }

            $product=$query->get();

            return DataTables::of($product)
                ->addIndexColumn()
                ->editColumn('status',function($row){
                    if ($row->status==0) {
                        return '<a href="#" class="deactive_featured"</span> <span class="badge badge-danger">Pending</span></a>';
                    }elseif($row->status==1){
                        return '<a href="#" class="active_featured"></span> <span class="badge badge-warning">Receivd</span></a>';
                    }
                    elseif($row->status==2){
                        return '<a href="#" class="active_featured">|</span> <span class="badge badge-warning">Shipped</span></a>';
                    }
                    elseif($row->status==3){
                        return '<a href="#" class="active_featured"></span> <span class="badge badge-success">Completed</span></a>';
                    }
                    elseif($row->status==4){
                        return '<a href="#" class="active_featured"></span> <span class="badge badge-warning">Return</span></a>';
                    }
                    elseif($row->status==5){
                        return '<a href="#" class="active_featured"></span> <span class="badge badge-warning">Cancel</span></a>';
                    }
                })
                ->addColumn('action', function($row){
                    $actionbtn='
                        <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="'.route('product.edit',[$row->id]).'" class="btn btn-info btn-sm edit"><i class="fas fa-edit"></i></a> 
                        <a href="'.route('product.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i>
                        </a>';

                    return $actionbtn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }

        $category=DB::table('categories')->get(); //Query Builder
        $subcategory=DB::table('subcategories')->get();
        $brand=DB::table('brands')->get();
        $warehouse=DB::table('warehouses')->get();
        //$category=Category::all(); // If Model
        
        return view('admin.order.order_index');
    }
}
