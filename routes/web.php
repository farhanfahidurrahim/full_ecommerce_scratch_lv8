<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/login',function(){
    return redirect()->to('/');
})->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/customer/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('customer.logout');

//Frontend All Routes...
Route::group(['namespace'=>'App\Http\Controllers\Frontend'], function(){
    Route::get('/','IndexController@index');
    Route::get('/product-details/{slug}','IndexController@productDetails')->name('product.details');
    Route::get('/product-quick-view/{id}','IndexController@ProductQuickView');

    //Cart
    Route::get('/all-cart','CartController@allCart')->name('all.cart'); //ajax req for frontend
    Route::get('/my-cart','CartController@myCart')->name('cart');
    Route::get('/empty-cart','CartController@emptyCart')->name('cart.empty');
    Route::post('/addtocart','CartController@AddToCartQV')->name('add.to.cart.quickview');

    Route::get('/checkout','CheckoutController@checkout')->name('checkout');
    Route::post('/order/place','CheckoutController@orderPlace')->name('order.place');

    //Wishlist
    Route::get('/wishlist','CartController@Wishlist')->name('wishlist');
    Route::get('/add-wishlist/{id}','CartController@addWishlist')->name('add.wishlist');
    Route::get('/clear-all-wishlist','CartController@clearAllWishlist')->name('clear.all.wishlist');
    Route::get('/remove-single-wishlist/{id}','CartController@removeSingleWishlist')->name('remove.single.wishlist');

    //Review
    Route::post('/store-review','ReviewController@storeReview')->name('store.review');

    //Setting Profile
    Route::get('/home/setting','ProfileController@setting')->name('customer.setting');
    Route::post('/home/password/update','ProfileController@passwordChange')->name('customer.passwordchange');
    Route::get('/my-order','ProfileController@myOrder')->name('my.order');
    Route::get('/view-order/{id}','ProfileController@viewOrder')->name('view.order');

    //__Payment Gateway
    Route::post('/success','CheckoutController@success')->name('success');
    Route::post('/fail','CheckoutController@fail')->name('fail');
    Route::get('/cancel',function(){
        return redirect()->to('/');
    })->name('cancel');


});

//Socialite - Google
    Route::get('oauth/{driver}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('social.oauth');
    Route::get('oauth/{driver}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('social.callback');