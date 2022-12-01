<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //All category index
    public function index()
    {   
        //QB...
        //$data=DB::table('categories')->orderBy('category_name','ASC')->get();

        //E_ORM
        $data=Category::all();
        return view('admin.category.cat_index',compact('data'));
    }

    //Add New Catgeory
    public function store(Request $request)
    {
        $request->validate([
            'category_name'=>'required|unique:categories|max:55',
        ]);

        //QB___
        //$data=array([
        //    'category_name'=>$request->category_name,
        //    'category_slug'=>Str::slug($request->category_name, '-'),
        //]);
        //DB::table('categories')->insert($data);

        //E_ORM___
        Category::insert([
            'category_name'=>$request->category_name,
            'category_slug'=>Str::slug($request->category_name, '-'),
        ]);

        $notification=array('messege' => 'Category Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //Edit Category
    public function edit($id)
    {   
        //QB___
        $data=DB::table('categories')->where('id',$id)->first();
        //$data=Category::findorfail($id);

        return view('admin.category.cat_edit',compact('data'));
    }

    //Update Category
    public function update(Request $request, $id)
    {
        //QB___
        $request->validate([
            'category_name'=>'required|unique:categories|max:55',
        ]);

        $data=array(
            'category_name'=>$request->category_name,
            'category_slug'=>Str::slug($request->category_name, '-'),
        );
        DB::table('categories')->where('id',$id)->update($data);

        $notification=array('messege' => 'Update Successfully!', 'alert-type' => 'success');
        return redirect()->route('category.index')->with($notification);
    }

    //Delete Catgeory
    public function destroy($id)
    {
        //DB___
        //DB::table('categories')->where('id',$id)->delete();

        //E_ORM___
        $cat=Category::find($id);
        $cat->delete();

        $notification=array('messege' => 'Category Deleted!', 'alert-type' => 'error');
        return redirect()->back()->with($notification);
    }

    //Product Create Page: get child category by Ajax!!
    public function GetChildCategory($id) //got $id; -> subcategory_id
    {
        $data=DB::table('childcategories')->where('subcategory_id',$id)->get();
        return response()->json($data);
    }
}
