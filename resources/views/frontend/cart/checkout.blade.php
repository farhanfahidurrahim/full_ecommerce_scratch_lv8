@extends('layouts.app')
@section('content')
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/cart_styles.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/cart_responsive.css">
@include('layouts.frontend_bar.collaps_nav')

<!-- Cart -->
	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart_container card p-1">
						<div class="cart_title text-center">Billing Address</div>
						<hr>
						 <form action="{{ route('order.place') }}" method="post" id="order-place">
						  	@csrf
							<div class="row p-3">
							  <div class="form-group col-lg-6">
								<label>Customer Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" value="{{ Auth::user()->name }}" name="c_name" required="" >
							  </div>
							  <div class="form-group col-lg-6">
								<label>Customer Phone <span class="text-danger">*</span></label>
								<input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="c_phone" required="" >
							  </div>
							  <div class="form-group col-lg-6">
								<label> Country <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="c_country" required="" >
							  </div>
							  <div class="form-group col-lg-6">
								<label>Shipping Address <span class="text-danger">*</span> </label>
								<input type="text" class="form-control" name="c_address" required="" >
							  </div>
							  
							  <div class="form-group col-lg-6">
								<label>Email Address</label>
								<input type="text" class="form-control" name="c_email" >
							  </div>
							  <div class="form-group col-lg-6">
								<label>Zip Code</label>
								<input type="text" class="form-control" name="c_zipcode" required="">
							  </div>
							  <div class="form-group col-lg-6">
								<label>City Name</label>
								<input type="text" class="form-control" name="c_city" required="">
							  </div>
							  <div class="form-group col-lg-6">
								<label>Extra Phone</label>
								<input type="text" class="form-control" name="c_extra_phone" required="" >
							  </div>
								<br>
							  	   <div class="form-group col-lg-4">
							  	 	<label>Paypal</label>
							  	 	<input type="radio"  name="payment_type" value="Paypal">
							  	   </div>
							  	   <div class="form-group col-lg-4">
							  	 	<label>Bkash/Rocket/Nagad </label>
							  	 	<input type="radio"  name="payment_type" checked="" value="Aamarpay" >
							  	   </div>
							  	   <div class="form-group col-lg-4">
							  	 	<label>Hand Cash</label>
							  	 	<input type="radio"  name="payment_type" value="Hand Cash" >
							  	   </div>
							  	   
							</div>
							<div class="form-group pl-2">
							  	<button type="submit" class="btn btn-info p-2" style="float:right;margin-right: 15px; margin-bottom: 15px;">Order Place</button>
							</div>

							<span class="visually-hidden pl-2 d-none progress">Progressing.....</span>

						  </form>
						<!-- Order Total -->	
					</div>
				</div>

				<div class="col-lg-4" style="margin-top:85px;">
					<div class="order_total">
						<div class="order_total_content text-md-right">
							<div class="checkout_custom_order" style="margin-top:18px;"><strong>Order Total: $ {{ Cart::total() }}</strong></div>
						</div>
					</div>
					<div class="cart_buttons">
						<a href="{{ route('checkout') }}" class="button cart_button_checkout">Payment Now!</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="{{ asset('public/frontend') }}/js/cart_custom.js"></script>

@endsection