<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

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

        return view('admin.setting.page.page_create');
    }
}
