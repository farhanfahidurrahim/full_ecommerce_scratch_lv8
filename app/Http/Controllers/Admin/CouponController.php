<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Index Coupon
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data=DB::table('coupons')->latest()->get();
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

        return view('admin.coupon.cp_index');
    }

    //Add Coupon
    public function store(Request $request)
    {
        $data=array();
        $data['coupon_code']=$request->coupon_code;
        $data['type']=$request->type;
        $data['coupon_amount']=$request->coupon_amount;
        $data['valid_date']=$request->valid_date;
        $data['status']=$request->status;

        DB::table('coupons')->insert($data);
        return response()->json('Coupon Store!');
        //$notification=array('messege' => 'Coupon Add!', 'alert-type' => 'success');
        //return redirect()->back()->with($notification);
    }

    //Delete Data
    public function destroy($id)
    {
        DB::table('coupons')->where('id',$id)->delete();
        $notification=array('messege' => 'Coupon Delete!', 'alert-type' => 'error');
        return redirect()->back()->with($notification);
    }
}
