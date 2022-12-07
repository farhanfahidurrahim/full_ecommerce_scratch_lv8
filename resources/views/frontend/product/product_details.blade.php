@extends('layouts.app')
@section('content')
		<!-- Menu -->
@include('layouts.frontend_bar.collaps_nav')
	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				@php
					$images=json_decode($product->images,true);
					$sizes=explode(',',$product->size);
					$colors=explode(',',$product->color);
				@endphp
				<!-- Images -->
				<div class="col-lg-1 order-lg-1 order-2">
					<ul class="image_list">
						@foreach($images as $image)
							<li data-image="{{ asset('public/files/product/'.$image) }}">
								<img src="{{ asset('public/files/product/'.$image) }}" alt="side image">
							</li>
						@endforeach
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-4 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ asset('public/files/product/'.$product->thumbnail) }}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-4 order-3">
					<div class="product_description">
						<div class="product_category">{{$product->category->category_name}} / {{$product->subcategory->subcategory_name}}</div>
						<div class="product_name" style="font-size: 20px;">{{$product->name}}</div>
						<div class="product_category"><b>Brand: {{$product->brand->brand_name}}</b></div>
						<div class="product_category"><b>Stock: {{$product->stock_quantity}}</b></div>
						<div class="product_category"><b>Unit: {{$product->unit}}</b></div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>

							@if($product->discount_price==NULL)
             					<div class="" style="margin-top: 35px;">Price: {{ $product->selling_price }}</div>
            				@else
              					<div class="" >Price: <del class="text-danger">{{ $product->selling_price }}</del class="text-danger">
              					{{ $product->discount_price }}</div>
            				@endif
						{{-- <div class="product_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum. laoreet turpis, nec sollicitudin dolor cursus at. Maecenas aliquet, dolor a faucibus efficitur, nisi tellus cursus urna, eget dictum lacus turpis.</p></div> --}}
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="form-group">
									<div class="row">
										@isset($product->size)
										<div class="col-lg-6">
											<label>Pick Size: </label>
											<select class="custom-select form-control-sm" name="size" style="min-width: 120px;">
												@foreach($sizes as $size)
												   <option value="{{ $size }}">{{ $size }}</option>
												@endforeach
											</select>
										</div>
										@endisset

										@isset($product->color)
										<div class="col-lg-6">
											<label>Pick Color: </label>
											<select class="custom-select form-control" name="color" style="min-width: 150px;">
												@foreach($colors as $row)
												   <option value="{{ $row }}">{{ $row }}</option>
												@endforeach
											</select>
										</div>
										@endisset
									</div>
								</div>
									<br>
								<div class="clearfix" style="z-index: 1000;">
									<!-- Product Quantity -->
									<div class="product_quantity clearfix ml-2">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[1-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div><br>
									</div>
								</div>
								
								<div class="button_container">
									<button type="button" class="button cart_button">Add to Cart</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								
							</form>
						</div>
					</div>
				</div>

				<!-- Right Side Description -->
				<div class="col-lg-3 order-3" style="border-left: 1px solid grey;">
					<strong>Pickup Point of this product</strong><br>
					<i class="fa fa-map-marker">{{$product->pickup_point->pickup_point_name }}</i>
						<hr>
					<strong>Home Delivery:</strong><br>
					<i class="fa fa-map-marker">{{$product->pickup_point->pickup_point_name }}</i>
						<hr>
					<strong>Product Return & Warrenty :</strong><br>
						-> 7 days return guarranty.<br> 
				 		-> Warrenty not available.
					 	<hr>
					@isset($product->video) 
					 <strong>Product Video : </strong>
					 <iframe width="340" height="205" src="https://www.youtube.com/embed/{{ $product->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					@endisset
				</div>
			</div>
			<br>
			<!-- Product Details Description -->
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
					    <div class="card-header">
							<h4>Product details of {{ $product->name }}</h4>
					    </div>
						<div class="card-body">
							{!! $product->description !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Related Product</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							
							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{ asset('public/frontend') }}/images/view_1.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225<span>$300</span></div>
										<div class="viewed_name"><a href="#">Beoplay H7</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{ asset('public/frontend') }}/images/view_2.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$379</div>
										<div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{ asset('public/frontend') }}/images/view_3.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225</div>
										<div class="viewed_name"><a href="#">Samsung J730F...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{ asset('public/frontend') }}/images/view_4.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$379</div>
										<div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{ asset('public/frontend') }}/images/view_5.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225<span>$300</span></div>
										<div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{ asset('public/frontend') }}/images/view_6.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$375</div>
										<div class="viewed_name"><a href="#">Speedlink...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_1.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_2.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_3.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_4.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_5.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_6.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_7.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_8.jpg" alt=""></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection