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
            $data=Product::latest()->get(); //EL ORM
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('thumbnail',function($row) use($imgurl){
                    return '<img src="'.$imgurl.'/'.$row->thumbnail.'"  height="30" width="30" >';
                })
                ->editColumn('category_name',function($row){
                    return $row->category->category_name;
                })
                ->editColumn('subcategory_name',function($row){
                    return $row->subcategory->subcategory_name;
                })
                ->editColumn('brand_name',function($row){
                    return $row->brand->brand_name;
                })
                ->editColumn('featured',function($row){
                    if ($row->featured==1) {
                        return "Yes";
                    }else{
                        return "No";
                    }
                })
                ->addColumn('action', function($row){
                    $actionbtn='';

                    return $actionbtn;
                })
                ->rawColumns(['action','category_name','subcategory_name','brand_name','thumbnail','featured'])
                ->make(true);
        }

        return view('admin.product.pro_index');
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

    
}
