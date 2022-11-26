<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //All Page show...
    public function index()
    {   
        $data=DB::table('pages')->latest()->get();
        return view('admin.setting.page.page_index',compact('data'));
    }

    //Crate Page...
    public function create()
    {
        return view('admin.setting.page.page_create');
    }

    //Store Page...
    public function store(Request $request)
    {   
        $request->validate([
            'page_position'=>'required',
            'page_name'=>'required',
            'page_title'=>'required',
            'page_description'=>'required',
        ]);

        $data=array();
        $data['page_position']=$request->page_position;
        $data['page_name']=$request->page_name;
        $data['page_title']=$request->page_title;
        $data['page_description']=$request->page_description;
        $data['page_slug']=Str::slug($request->page_name, '-');

        DB::table('pages')->insert($data);

        $notification=array('messege' => 'A New Pages Created!', 'alert-type' => 'success');
        return redirect()->route('page.index')->with($notification);
    }

    //Edit Page
    public function edit($id)
    {   
        $page=DB::table('pages')->where('id',$id)->first();
        return view('admin.setting.page.page_edit',compact('page'));
    }

    //Update Page
    public function update(Request $request, $id)
    {
        $data=array();
        $data['page_position']=$request->page_position;
        $data['page_name']=$request->page_name;
        $data['page_title']=$request->page_title;
        $data['page_description']=$request->page_description;
        $data['page_slug']=Str::slug($request->page_name, '-');

        DB::table('pages')->where('id',$id)->update($data);

        $notification=array('messege' => 'Page Updated!', 'alert-type' => 'success');
        return redirect()->route('page.index')->with($notification);
    }

    //Delete Page
    public function destroy($id)
    {
        DB::table('pages')->where('id',$id)->delete($id);

        $notification=array('messege' => 'Page Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
