<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Illuminate\Support\Str;

class ChildcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //All Childcategory yajraDataTable
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data=DB::table('childcategories')
                ->leftJoin('categories','childcategories.category_id','categories.id')
                ->leftJoin('subcategories','childcategories.subcategory_id','subcategories.id')
                ->select('categories.category_name','subcategories.subcategory_name','childcategories.*')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $actionbtn='<a href="'.route('childcategory.destroy',[$row->id]).'" class="btn btn-info btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $category=DB::table('categories')->get();
        return view('admin.childcategory.childcat_index',compact('category'));
    }

    public function store(Request $request)
    {
        $cat=DB::table('subcategories')->where('id',$request->subcategory_id)->first();

        $data=array();
        $data['category_id']=$cat->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['childcategory_name']=$request->childcategory_name;
        $data['childcategory_slug']=Str::slug($request->childcategory_name, '-');

        DB::table('childcategories')->insert($data);
        $notification=array('messege' => 'Childcategory Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        DB::table('childcategories')->where('id',$id)->delete();
        $notification=array('messege' => 'Childcategory Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    //___________________________________________________________

    //All Childcategory
    //public function index()
    //{   
        //QB___
    //    $data=DB::table('childcategories')
    //        ->leftJoin('subcategories','childcategories.subcategory_id','subcategories.id')
    //        ->leftJoin('categories','childcategories.category_id','categories.id')
    //        ->select('childcategories.*','subcategories.subcategory_name','categories.category_name')
    //        ->get();
    //    $subcategory=DB::table('subcategories')->get();
    //    $category=DB::table('categories')->get();

    //    return view('admin.childcategory.childcat_index',compact('data','subcategory','category'));
    //}

    //Add Childcategory
    //public function store(Request $request)
    //{
    //    $request->validate([
    //        'childcategory_name'=>'required|unique:childcategories|max:22',
    //    ]);
    //    $data=array();
    //    $data['category_id']=$request->category_id;
    //    $data['subcategory_id']=$request->subcategory_id;
    //    $data['childcategory_name']=$request->childcategory_name;
    //    $data['childcategory_slug']=Str::slug($request->childcategory_name, '-');
    //    DB::table('childcategories')->insert($data);

    //    $notification=array('messege' => 'Childcategory Inserted!', 'alert-type' => 'success');
    //    return redirect()->back()->with($notification);
    //}
}
