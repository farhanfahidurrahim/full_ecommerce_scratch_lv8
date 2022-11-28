<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Index Warehouse
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data=DB::table('warehouses')->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $actionbtn='
                        <a href="'.route('warehouse.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.warehouse.war_index');
    }

    //Add Warehouse
    public function store(Request $request)
    {   
        $request->validate([
            'warehouse_name'=>'required|unique:warehouses',
        ]);

        $data=array();
        $data['warehouse_name']=$request->warehouse_name;
        $data['warehouse_address']=$request->warehouse_address;
        $data['warehouse_phone']=$request->warehouse_phone;

        DB::table('warehouses')->insert($data);
        $notification=array('messege' => 'Warehouse Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //Delete Warehouse
    public function destroy($id)
    {
        DB::table('warehouses')->where('id',$id)->delete();
        $notification=array('messege' => 'Warehouse Delete!', 'alert-type' => 'error');
        return redirect()->back()->with($notification);
    }
}
