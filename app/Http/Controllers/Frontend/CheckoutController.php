<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Cart;
use DB;
use Mail;
use App\Mail\InvoiceMail;

class CheckoutController extends Controller
{
    public function Checkout()
    {   
        //Checkout page
        if (!Auth::check()) {

            $notification=array('messege' => 'Please Login your account', 'alert-type' => 'error'); 
            return redirect()->back()->with($notification);
        }

        $content=Cart::content();
        return view('frontend.cart.checkout',compact('content'));
    }

    //Order Place
    public function orderPlace(Request $request)
    {
        //Validation baki ase------//

        if ($request->payment_type=="Hand Cash") {
            $order=array();
            $order['user_id']=Auth::id();
            $order['c_name']=$request->c_name;
            $order['c_phone']=$request->c_phone;
            $order['c_country']=$request->c_country;
            $order['c_address']=$request->c_address;
            $order['c_email']=$request->c_email;
            $order['c_zipcode']=$request->c_zipcode;
            $order['c_extra_phone']=$request->c_extra_phone;
            $order['c_city']=$request->c_city;
            //if(Session::has('coupon')){
            //    $order['subtotal']=Cart::subtotal();
            //    $order['coupon_code']=Session::get('coupon')['name'];
            //    $order['coupon_discount']=Session::get('coupon')['discount'];
           //     $order['after_dicount']=Session::get('coupon')['after_discount'];
            //}else{
            //    $order['subtotal']=Cart::subtotal();
                
            //}
            $order['total']=Cart::total();
            $order['payment_type']=$request->payment_type;
            $order['tax']=0;
            $order['shipping_charge']=0;
            $order['order_id']=rand(10000,900000);
            $order['status']=0;
            $order['date']=date('d-m-Y');
            $order['month']=date('F');
            $order['year']=date('Y');

            $order_id=DB::table('orders')->insertGetId($order);

            Mail::to($request->c_email)->send(new InvoiceMail($order));

            //order details
            $content=Cart::content();

            $details=array();
            foreach($content as $row){
                $details['order_id']=$order_id;
                $details['product_id']=$row->id;
                $details['product_name']=$row->name;
                $details['color']=$row->options->color;
                $details['size']=$row->options->size;
                $details['quantity']=$row->qty;
                $details['single_price']=$row->price;
                $details['subtotal_price']=$row->price*$row->qty;

                DB::table('order_details')->insert($details);
            }

            Cart::destroy();
            $notification=array('messege' => 'Successfully Order Placed by Handcash', 'alert-type' => 'success');
            return redirect()->to('/')->with($notification);

        //___Aamarpay Payment Gateway___

        }elseif($request->payment_type=="Aamarpay"){
            
            $aamarpay=DB::table('payment_gateway_bd')->first();
            if ($aamarpay->store_id==NULL) {
                $notification=array('messege' => 'Please Setting Your Payment Gateway!', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }else{
                if ($aamarpay->status==1) {
                    $url = 'https://secure.aamarpay.com/request.php'; // live url https://secure.aamarpay.com/request.php.
                }else{
                    $url = 'https://sandbox.aamarpay.com/request.php'; // live url https://secure.aamarpay.com/request.php
                }

                $fields = array(
                    'store_id' => $aamarpay->store_id, //store id will be aamarpay,  contact integration@aamarpay.com for test/live id
                    'amount' => '200', //transaction amount
                    'payment_type' => 'VISA', //no need to change
                    'currency' => 'BDT',  //currenct will be USD/BDT
                    'tran_id' => rand(1111111,9999999), //transaction id must be unique from your end
                    'cus_name' => $request->c_name,  //customer name
                    'cus_email' => $request->c_email, //customer email address
                    'cus_add1' => $request->address,  //customer address
                    'cus_add2' => 'Mohakhali DOHS', //customer address
                    'cus_city' => $request->c_city,  //customer city
                    'cus_state' => 'Dhaka',  //state
                    'cus_postcode' => $request->c_zipcode, //postcode or zipcode
                    'cus_country' => $request->c_country,  //country
                    'cus_phone' => $request->c_phone, //customer phone number
                    'cus_fax' => $request->c_extra_phone,  //fax
                    'ship_name' => 'ship name', //ship name
                    'ship_add1' => 'House B-121, Road 21',  //ship address
                    'ship_add2' => 'Mohakhali',
                    'ship_city' => 'Dhaka', 
                    'ship_state' => 'Dhaka',
                    'ship_postcode' => '1212', 
                    'ship_country' => 'Bangladesh',
                    'desc' => 'payment description', 
                    'success_url' => route('success'), //your success route
                    'fail_url' => route('fail'), //your fail route
                    'cancel_url' => route('cancel'), //your cancel url
                    'opt_a' => $request->c_country,  //optional paramter
                    'opt_b' => $request->c_city,
                    'opt_c' => $request->c_phone, 
                    'opt_d' => $request->c_address,
                    'signature_key' => $aamarpay->signature_key); //signature key will provided aamarpay, contact integration@aamarpay.com for test/live signature key

                $fields_string = http_build_query($fields);
         
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            curl_setopt($ch, CURLOPT_URL, $url);  
      
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));  
            curl_close($ch); 

            $this->redirect_to_merchant($url_forward);
            }            
        }
    }

    function redirect_to_merchant($url) {

        ?>
        <html xmlns="http://www.w3.org/1999/xhtml">
          <head><script type="text/javascript">
            function closethisasap() { document.forms["redirectpost"].submit(); } 
          </script></head>
          <body onLoad="closethisasap();">
          
            <form name="redirectpost" method="post" action="<?php echo 'https://sandbox.aamarpay.com/'.$url; ?>"></form>
            <!-- for live url https://secure.aamarpay.com -->
          </body>
        </html>
        <?php   
        exit;
    } 

    //___Payment Gateway Data Insert into DB
    public function success(Request $request){
        $order=array();
            $order['user_id']=Auth::id();
            $order['c_name']=$request->cus_name;
            $order['c_phone']=$request->opt_c;
            $order['c_country']=$request->opt_a;
            $order['c_address']=$request->opt_d;
            $order['c_email']=$request->cus_email;
            $order['c_city']=$request->opt_b;
            //if(Session::has('coupon')){
            //    $order['subtotal']=Cart::subtotal();
            //    $order['coupon_code']=Session::get('coupon')['name'];
            //    $order['coupon_discount']=Session::get('coupon')['discount'];
           //     $order['after_dicount']=Session::get('coupon')['after_discount'];
            //}else{
            //    $order['subtotal']=Cart::subtotal();
                
            //}
            $order['total']=Cart::total();
            $order['payment_type']='Aamarpay';
            $order['tax']=0;
            $order['shipping_charge']=0;
            $order['order_id']=rand(10000,900000);
            $order['status']=1;
            $order['date']=date('d-m-Y');
            $order['month']=date('F');
            $order['year']=date('Y');

            $order_id=DB::table('orders')->insertGetId($order);

            Mail::to(Auth::user()->email)->send(new InvoiceMail($order));

            //order details
            $content=Cart::content();

            $details=array();
            foreach($content as $row){
                $details['order_id']=$order_id;
                $details['product_id']=$row->id;
                $details['product_name']=$row->name;
                $details['color']=$row->options->color;
                $details['size']=$row->options->size;
                $details['quantity']=$row->qty;
                $details['single_price']=$row->price;
                $details['subtotal_price']=$row->price*$row->qty;

                DB::table('order_details')->insert($details);
            }

            Cart::destroy();
            $notification=array('messege' => 'Successfully Order Placed by Online!', 'alert-type' => 'success');
            return redirect()->route('home')->with($notification);
    }

    public function fail(Request $request){
        return $request;
    }
}
