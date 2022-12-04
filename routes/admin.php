<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');

// Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');

Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware' => 'is_admin'], function(){

	//Admin routes...
	Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
	Route::get('/admin/logout','AdminController@logout')->name('admin.logout');
	Route::get('/admin/password/change','AdminController@passwordChange')->name('admin.password.change');
	Route::post('/admin/password/update','AdminController@passwordUpdate')->name('admin.password.update');

	//Category routes...
	Route::group(['prefix'=>'category'], function(){
		Route::get('/all','CategoryController@index')->name('category.index');
		Route::post('/add','CategoryController@store')->name('category.store');
		Route::get('/delete/{id}','CategoryController@destroy')->name('category.destroy');
		Route::get('/edit/{id}','CategoryController@edit')->name('category.edit');
		Route::post('/update/{id}','CategoryController@update')->name('category.update');
	});

	//Global Routes...
	Route::get('/get-child-category/{id}','CategoryController@GetChildCategory');

	//SubCategory routes...
	Route::group(['prefix'=>'subcategory'], function(){
		Route::get('/all','SubcategoryController@index')->name('subcategory.index');
		Route::post('/add','SubcategoryController@store')->name('subcategory.store');
		Route::get('/delete/{id}','SubcategoryController@destroy')->name('subcategory.destroy');
		Route::get('/edit/{id}','SubcategoryController@edit')->name('subcategory.edit');
		Route::post('/update/{id}','SubcategoryController@update')->name('subcategory.update');
	});

	//ChildCategory routes...
	Route::group(['prefix'=>'childcategory'], function(){
		Route::get('/all','ChildcategoryController@index')->name('childcategory.index');
		Route::post('/add','ChildcategoryController@store')->name('childcategory.store');
		Route::get('/delete/{id}','ChildcategoryController@destroy')->name('childcategory.destroy');
	});

	//Brand routes...
	Route::group(['prefix'=>'brand'], function(){
		Route::get('/all','BrandController@index')->name('brand.index');
		Route::post('/add','BrandController@store')->name('brand.store');
		Route::get('/delete/{id}','BrandController@destroy')->name('brand.destroy');
	});

	//Warehouse routes... Full Ajax & Yajra DataTable
	Route::group(['prefix'=>'warehouse'], function(){
		Route::get('/','WarehouseController@index')->name('warehouse.index');
		Route::post('/add','WarehouseController@store')->name('warehouse.store');
		Route::get('/edit/{id}','WarehouseController@edit');
		Route::post('/update','WarehouseController@update')->name('warehouse.update');
		Route::get('/delete/{id}','WarehouseController@destroy')->name('warehouse.delete');
	});

	//Coupon routes...
	Route::group(['prefix'=>'coupon'], function(){
		Route::get('/','CouponController@index')->name('coupon.index');
		Route::post('/store','CouponController@store')->name('coupon.store');
		// Route::get('/edit/{id}','WarehouseController@edit');
		// Route::post('/update','WarehouseController@update')->name('warehouse.update');
		Route::get('/delete/{id}','CouponController@destroy')->name('coupon.delete');
	});

	//Pickup Point
	Route::group(['prefix'=>'pickup-point'], function(){
		Route::get('/','PickupController@index')->name('pickuppoint.index');
		//Route::post('/store','CouponController@store')->name('coupon.store');
		// Route::get('/edit/{id}','WarehouseController@edit');
		// Route::post('/update','WarehouseController@update')->name('warehouse.update');
		Route::get('/delete/{id}','CouponController@destroy')->name('coupon.delete');
	});

	//Product routes...
	Route::group(['prefix'=>'product'], function(){
		Route::get('/','ProductController@index')->name('product.index');
		Route::get('/create','ProductController@create')->name('product.create');
		Route::post('/store','ProductController@store')->name('product.store');
		//Route::post('/edit/{id}','ProductController@store')->name('product.edit');
		//Route::post('/store','ProductController@store')->name('product.delete');
		Route::get('/yes-featured/{id}','ProductController@yesfeatured');
		Route::get('/not-featured/{id}','ProductController@notfeatured');
		Route::get('/yes-deal/{id}','ProductController@yesdeal');
		Route::get('/not-deal/{id}','ProductController@notdeal');
		Route::get('/yes-status/{id}','ProductController@yesstatus');
		Route::get('/not-status/{id}','ProductController@notstatus');
	});

	//Setting routes...
	Route::group(['prefix'=>'setting'], function(){
		//__Seo
		Route::group(['prefix'=>'seo'], function(){
			Route::get('/','SettingController@seo')->name('setting.seo');
			Route::post('/update/{id}','SettingController@seoUpdate')->name('setting.seo.update');
		});

		//__Website
		Route::group(['prefix'=>'website'], function(){
			Route::get('/','SettingController@website')->name('setting.website');
			Route::post('/update/{id}','SettingController@websiteUpdate')->name('setting.website.update');
		});

		//__Page
		Route::group(['prefix'=>'page'], function(){
			Route::get('/all','PageController@index')->name('page.index');
			Route::get('/create','PageController@create')->name('page.create');
			Route::post('/store','PageController@store')->name('page.store');
			Route::get('/edit/{id}','PageController@edit')->name('page.edit');
			Route::post('/update/{id}','PageController@update')->name('page.update');
			Route::get('/delete/{id}','PageController@destroy')->name('page.destroy');
		});
	});


});
