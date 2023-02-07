<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Auth;
use Illuminate\Support\Str;
use Image;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Index Product by Ajax
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $imgurl='public/files/product';

            $product="";
                $query=DB::table('products')
                    ->leftJoin('categories','products.category_id','categories.id')
                    ->leftJoin('subcategories','products.subcategory_id','subcategories.id')
                    ->leftJoin('brands','products.brand_id','brands.id');
                if ($request->category_id) {
                    $query->where('products.category_id',$request->category_id);
                }
                //if ($request->subcategory_id) {
                //    $query->where('products.subcategory_id',$request->subcategory_id);
                //}
                if ($request->brand_id) {
                    $query->where('products.brand_id',$request->brand_id);
                }
                if ($request->warehouse) {
                    $query->where('products.warehouse',$request->warehouse);
                }
            $product=$query->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')
                    ->get();

            return DataTables::of($product)
                ->addIndexColumn()
                ->editColumn('thumbnail',function($row) use($imgurl){
                    return '<img src="'.$imgurl.'/'.$row->thumbnail.'"  height="30" width="30" >';
                })
                //EL ORM Model ->123
                //->editColumn('category_name',function($row){
                    //return $row->category->category_name;
                //})
                //->editColumn('subcategory_name',function($row){
                    //return $row->subcategory->subcategory_name;
                //})
                //->editColumn('brand_name',function($row){
                    //return $row->brand->brand_name;
                //})
                ->editColumn('featured',function($row){
                    if ($row->featured==1) {
                        return '<a href="#" data-id="'.$row->id.'" class="deactive_featured"><span class="badge badge-success">Active</span> <span>||</span> <span class="badge badge-warning">Click:Deactive</span></a>';
                    }else{
                        return '<a href="#" data-id="'.$row->id.'" class="active_featured"><span class="badge badge-danger">Deactive</span> <span>||</span> <span class="badge badge-warning">Click:Active</span></a>';
                    }
                })
                ->editColumn('today_deal',function($row){
                    if ($row->today_deal==1) {
                        return '<a href="#" data-id="'.$row->id.'" class="deactive_deal"><span class="badge badge-success">Active</span> <span>||</span> <span class="badge badge-warning">Click:Deactive</span></a>';
                    }else{
                        return '<a href="#" data-id="'.$row->id.'" class="active_deal"><span class="badge badge-danger">Deactive</span> <span>||</span> <span class="badge badge-warning">Click:Active</span></a>';
                    }
                })
                ->editColumn('status',function($row){
                    if ($row->status==1) {
                        return '<a href="#" data-id="'.$row->id.'" class="deactive_status"><span class="badge badge-success">Active</span> <span>||</span> <span class="badge badge-warning">Click:Deactive</span></a>';
                    }else{
                        return '<a href="#" data-id="'.$row->id.'" class="active_status"><span class="badge badge-danger">Deactive</span> <span>||</span> <span class="badge badge-warning">Click:Active</span></a>';
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
                ->rawColumns(['action','category_name','subcategory_name','brand_name','thumbnail','featured','today_deal','status'])
                ->make(true);
        }

        $category=DB::table('categories')->get(); //Query Builder
        $subcategory=DB::table('subcategories')->get();
        $brand=DB::table('brands')->get();
        $warehouse=DB::table('warehouses')->get();
        //$category=Category::all(); // If Model
        
        return view('admin.product.pro_index',compact('category','subcategory','brand','warehouse'));
    }

    //Add Prodcut
    public function create()
    {
        $category=DB::table('categories')->get();
        $brand=DB::table('brands')->get();
        $pickup_point=DB::table('pickup_point')->get();
        $warehouse=DB::table('warehouses')->get();

        return view('admin.product.prod_create',compact('category','brand','pickup_point','warehouse'));
    }

    //Store Product
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'code'=>'required|unique:products|max:15',
            'subcategory_id'=>'required',
            'brand_id'=>'required',
            'unit'=>'required',
            'selling_price'=>'required',
            'color'=>'required',
            'description'=>'required',
        ]);

        //subcategory to category id receive
        $subcategory=DB::table('subcategories')->where('id',$request->subcategory_id)->first();
        //$subcategory->category_id; [[this is going $data array part for get category_id]

        $data=array();
        $data['name']=$request->name;
        $data['slug']=Str::slug($request->name, '-');
        $data['code']=$request->code;
        $data['category_id']=$subcategory->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['childcategory_id']=$request->childcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['pickup_point_id']=$request->pickup_point_id;
        $data['unit']=$request->unit;
        $data['tags']=$request->tags;
        $data['purchase_price']=$request->purchase_price;
        $data['selling_price']=$request->selling_price;
        $data['discount_price']=$request->discount_price;
        $data['warehouse']=$request->warehouse;
        $data['stock_quantity']=$request->stock_quantity;
        $data['color']=$request->color;
        $data['size']=$request->size;
        $data['description']=$request->description;
        $data['video']=$request->video;
        $data['featured']=$request->featured;
        $data['today_deal']=$request->today_deal;
        $data['status']=$request->status;
        $data['trendy']=$request->trendy;
        $data['product_slider']=$request->product_slider;
        $data['admin_id']=Auth::id(); 
        $data['date']=date('d-m-Y');
        $data['month']=date('F');

        $slug=Str::slug($request->name, '-');
        //Single Thumbnail
        if ($request->thumbnail) {

            $thumbnail=$request->thumbnail;
            $photoname=$slug.'.'.$thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(600,600)->save('public/files/product/'.$photoname);
            $data['thumbnail']=$photoname;
        }

        //Multiple Images
        $images=array();
        if ($request->hasFile('images')) {
            foreach($request->file('images') as $key=>$image){
                $imageName= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(600,600)->save('public/files/product/'.$imageName);
                array_push($images, $imageName);
            }
            $data['images'] = json_encode($images);
        }

        DB::table('products')->insert($data);

        $notification=array('messege' => 'Product Add Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //Not Featured
    public function notfeatured($id)
    {
        DB::table('products')->where('id',$id)->update(['featured'=>0]);
        return response()->json('Product Not Featured');
    }

    //Yes Featured
    public function yesfeatured($id)
    {
        DB::table('products')->where('id',$id)->update(['featured'=>1]);
        return response()->json('Product Now Featured');
    }
    //Not Deal
    public function notdeal($id)
    {
        DB::table('products')->where('id',$id)->update(['today_deal'=>0]);
        return response()->json('Product Today Deal Deactive');
    }
    //Yes Deal
    public function yesdeal($id)
    {
        DB::table('products')->where('id',$id)->update(['today_deal'=>1]);
        return response()->json('Product Today Deal Active');
    }
    //Not Status
    public function notstatus($id)
    {
        DB::table('products')->where('id',$id)->update(['status'=>0]);
        return response()->json('Product Status OFF');
    }
    //Yes Status
    public function yesstatus($id)
    {
        DB::table('products')->where('id',$id)->update(['status'=>1]);
        return response()->json('Product Status ON');
    }

}
