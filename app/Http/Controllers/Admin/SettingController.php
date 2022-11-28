<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //SEO Page Show...
    public function seo()
    {   
        $data=DB::table('seos')->first();
        return view('admin.setting.seo',compact('data'));       
    }

    //SEO Page Update
    public function seoUpdate(Request $request, $id)
    {
        $data=array();
        $data['meta_title']=$request->meta_title;
        $data['meta_author']=$request->meta_author;
        $data['meta_tag']=$request->meta_tag;
        $data['meta_keyword']=$request->meta_keyword;
        $data['meta_description']=$request->meta_description;
        $data['alexa_verification']=$request->alexa_verification;
        $data['google_verification']=$request->google_verification;
        $data['google_verification']=$request->google_verification;
        $data['google_analytics']=$request->google_analytics;

        DB::table('seos')->where('id',$id)->update($data);
        $notification=array('messege' => 'SEO Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //Website Setting...
    public function website()
    {
        $data=DB::table('settings')->first();
        return view('admin.setting.website',compact('data'));
    }

    public function websiteUpdate(Request $request, $id)
    {
        $data=array();
        $data['currency_icon']=$request->currency_icon;
        $data['phone_one']=$request->phone_one;
        $data['phone_two']=$request->phone_two;
        $data['main_email']=$request->main_email;
        $data['support_email']=$request->support_email;
        $data['address']=$request->address;
        $data['facebook']=$request->facebook;
        $data['instagram']=$request->instagram;
        $data['youtube']=$request->youtube;
        //Image Logo Code...
        if ($request->logo) { //If New Logo Upload
                $logo=$request->logo;
                $logoName=uniqid().'.'.$logo->getClientOriginalExtension();
                //$photo->move('public/files/brand/',$photoname); //Without image intervention
                //Image Intervention...
                Image::make($logo)->resize(320,120)->save('public/files/setting/'.$logoName);
            $data['logo']='public/files/setting/'.$logoName;

        }else{ //If New Logo Dont Need
            $data['logo']=$request->old_logo;
        }

        //Image Favicon Code...
        if ($request->favicon) { //If New Favicon Upload
                $favicon=$request->favicon;
                $faviconName=uniqid().'.'.$favicon->getClientOriginalExtension();
                //$photo->move('public/files/brand/',$photoname); //Without image intervention
                //Image Intervention...
                Image::make($favicon)->resize(32,32)->save('public/files/setting/'.$faviconName);
            $data['favicon']='public/files/setting/'.$faviconName;

        }else{ //If New Favicon Dont Need
            $data['favicon']=$request->old_favicon;
        }
        

        DB::table('settings')->where('id',$id)->update($data);
        $notification=array('messege' => 'Website Setting Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
