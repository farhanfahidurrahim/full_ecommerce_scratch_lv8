<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;

class PickupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Index Coupon
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data=DB::table('pickup_point')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>
                        <a href="'.route('coupon.delete',[$row->id]).'"  class="btn btn-danger btn-sm" id="delete_coupon"><i class="fas fa-trash"></i>
                        </a>';

                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pickup_point.pp_index');
    }
}
