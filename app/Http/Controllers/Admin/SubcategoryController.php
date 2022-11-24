<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //All Subcat Index
    public function index()
    {   
        //QB___
        $data=DB::table('subcategories')
            ->leftJoin('categories','subcategories.category_id','categories.id')
            ->select('subcategories.*','categories.category_name')
            ->orderBy('subcategory_name','ASC')
            ->get();
        $category=DB::table('categories')->get();
        
        //EL_ORM___
        //$category=Category::all();

        return view('admin.subcategory.subcat_index',compact('data','category'));
    }

    //Add Subcategory
    public function store(Request $request)
    {
        //QB___
        $request->validate([
            'subcategory_name'=>'required|max:55',
        ]);

        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        $data['subcat_slug']=Str::slug($request->subcategory_name, '-');
        DB::table('subcategories')->insert($data);

        //El_ORM___
        //Subcategory::insert([
        //    'category_id'=>$request->category_id,
        //    'subcategory_name'=>$request->subcategory_name,
        //    'subcategory_slug'=>Str::slug($request->subcategory_name, '-'),
        //]);

        $notification=array('messege' => 'Subcategory Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //Edit Subcategory
    public function edit($id)
    {   
        //QB___
        //$data=DB::table('subcategories')->where('id',$id)->first();
        //$category=DB::table('categories')->get();

        //El_ORM___
        $data=Subcategory::find($id);
        $category=Category::all();

        return view('admin.subcategory.subcat_edit',compact('data','category'));
    }

    //Update Subcategory
    public function update(Request $request, $id)
    {
        $request->validate([
            'subcategory_name'=>'required|max:22',
        ]);
        
        //QB___
        //$data=array();
        //$data['category_id']=$request->category_id;
        //$data['subcategory_name']=$request->subcategory_name;
        //$data['subcat_slug']=Str::slug($request->subcategory_name, '-');
        //DB::table('subcategories')->where('id',$id)->update($data);

        //El_ORM___
        $data=Subcategory::where('id',$id)->first();
        $data->update([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'subcat_slug'=>Str::slug($request->subcategory_name, '-')
        ]);

        $notification=array('messege' => 'Subcategory Updated!', 'alert-type' => 'success');
        return redirect()->route('subcategory.index')->with($notification);
    }

    //Delete Subcategory
    public function destroy($id)
    {
        //QB___
        //DB::table('subcategories')->where('id',$id)->delete();

        //EL_ORM___
        $data=Subcategory::find($id);
        $data->delete();

        $notification=array('messege' => 'Subcategory Deleted!', 'alert-type' => 'error');
        return redirect()->back()->with($notification);
    }
}
