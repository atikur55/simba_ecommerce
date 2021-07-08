<?php

use Illuminate\Support\Facades\Route;

Route::get('/','FrontendController@index');
Route::get('/about','FrontendController@about');
Route::get('/contact','FrontendController@contact');
Route::get('/faq','FrontendController@faq');
Route::get('/shop','FrontendController@shop');
Route::get('/search','FrontendController@search');
Route::post('add/to/cart','CartController@addtocart');
Route::get('delete/cart/{cart_id}','CartController@deletecart');
Route::get('cart','CartController@cart');
Route::get('cart/{coupon_name}','CartController@cart');
Route::post('update/cart','CartController@updatecart');
Route::post('/checkout','CheckoutController@checkout');
Route::post('/checkoutpost','CheckoutController@checkoutpost');
Route::get('/get/city/list','CheckoutController@getcitylist');
Route::get('onlinepayment','CheckoutController@onlinepayment');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/addfaq','HomeController@addfaq');
Route::post('/addfaqpost','HomeController@addfaqpost');
Route::get('/faq_delete/{faq_id}','HomeController@faq_delete');
Route::get('/faq_edit/{faq_id}','HomeController@faq_edit');
Route::post('/faq_edit_post','HomeController@faq_edit_post');
Route::get('/faq_restore/{faq_id}','HomeController@faq_restore');
Route::get('/faq_force_delete/{faq_id}','HomeController@faq_force_delete');
Route::get('/users','HomeController@users');
Route::get('/editprofile','HomeController@editprofile');
Route::post('/editprofilepost','HomeController@editprofilepost');
Route::resource('category','CategoryController');
Route::resource('product','ProductController');
Route::get('customer/home','CustomerController@customerhome');
Route::resource('coupon','CouponController');
Route::get('order/download/{order_id}','CustomerController@orderdownload');
Route::get('send/sms/{order_id}','CustomerController@sendsms');
Route::post('/addreview','CustomerController@addreview');

Route::get('register/github', 'GithubController@redirectToProvider');
Route::get('register/github/callback', 'GithubController@handleProviderCallback');
Route::get('role/manager', 'RoleController@rolemanager')->name('role.manager');
