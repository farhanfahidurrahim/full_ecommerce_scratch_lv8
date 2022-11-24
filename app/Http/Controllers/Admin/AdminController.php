<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //___After Login____
    public function admin()
    {
        return view('admin.home');
    }

    //___Admin Custom Logout__
    public function logout()
    {
        Auth::logout();

        $notification=array('messege' => 'You are Logged out!', 'alert-type' => 'success');

        return redirect()->route('admin.login')->with($notification);
    }

    //__Admin_Password_Change
    public function passwordChange()
    {
        return view('admin.profile.password_change');
    }

    //__Admin_Password_Update
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_password'=>'required',
            'password'=>'required|min:6|confirmed',
        ]);

        $current_password=Auth::user()->password;
        $oldpass = $request->old_password;
        $new_password = $request->password;
        if (Hash::check($oldpass,$current_password)) {
            $user=User::findorfail(Auth::id()); //Model El ORM
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification=array('messege' => 'Your Password Changed Successfully!', 'alert-type' => 'success');
            return redirect()->route('admin.login')->with($notification);
        }else{
            $notification=array('messege' => 'Current Password Not Matched!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        //'old_password'=>$request->old_password,
        //    'password'=>$request->password,
        //    'password_confirmation'=>$request->password_confirmation,
    }
}
