<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class IndexController extends Controller
{
    public function Index()
    {   
        $category=Category::all();
        return view('frontend.front_index',compact('category'));
    }
}
