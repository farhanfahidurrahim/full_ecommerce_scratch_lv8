<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Illuminate\Support\Str;
use Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //All Brand yajraDataTable
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data=DB::table('brands')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $actionbtn='<a href="'.route('brand.destroy',[$row->id]).'" class="btn btn-info btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.brand.brand_index');
    }

    //Add Brand
    public function store(Request $request)
    {   
        $request->validate([
            'brand_name'=>'required|unique:brands|max:50'
        ]);

        $slug=Str::slug($request->brand_name, '-');

        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_slug']=Str::slug($request->brand_name, '-');
         //Image Code...
            $photo=$request->brand_logo;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            //$photo->move('public/files/brand/',$photoname); //Without image intervention
            //Image Intervention...
            Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname); 

        $data['brand_logo']='public/files/brand/'.$photoname;
        DB::table('brands')->insert($data);

        $notification=array('messege' => 'Brand Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //Delete Brand
    public function destroy($id)
    {
        DB::table('brands')->where('id',$id)->delete();
        $notification=array('messege' => 'Brand Delete!', 'alert-type' => 'error');
        return redirect()->back()->with($notification);
    }

}
