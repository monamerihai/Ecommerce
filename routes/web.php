<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\Customer;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CartController;



/*

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
//LoginController

Route::get('/', [LoginController::class, 'index']);
Route::post('/login_acn', [LoginController::class, 'login_acn']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'Adminauth'], function () {
  Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');



  Route::get('/changepassword', [LoginController::class, 'changepassword'])->name('changepassword');
  Route::post('/updatepassword', [LoginController::class, 'updatepassword'])->name('updatepassword');
  Route::get('profile', [LoginController::class, 'showprofile'])->name('profile');
  Route::post('profileupdate/{id}', [LoginController::class, 'profileupdate'])->name('profileupdate');

  //category controller

  Route::get('/category', [CategoryController::class, 'index'])->name('category');
  Route::post('/store', [CategoryController::class, 'store'])->name('store');
  Route::get('/delete/{category1}', [CategoryController::class, 'delete'])->name('delete');
  Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
  Route::post('/update', [CategoryController::class, 'update'])->name('update');


  //Subcategory Controller

  Route::get('/subcategory', [SubcategoryController::class, 'index'])->name('subcategory');
  Route::post('/subcatstore', [SubcategoryController::class, 'subcatstore'])->name('subcatstore');
  Route::get('/subdelete/{id}', [SubcategoryController::class, 'subdelete'])->name('subdelete');
  Route::get('/subcatedit/{id}', [SubcategoryController::class, 'subcatedit'])->name('subcatedit');
  Route::post('/subcatupdate', [SubcategoryController::class, 'subcatupdate'])->name('subcatupdate');



  //Product Controller

  Route::get('/product', [ProductController::class, 'index'])->name('product');
  Route::post('/productstore', [ProductController::class, 'productstore'])->name('productstore');
  Route::get('/productdelete/{id}', [ProductController::class, 'productdelete'])->name('productdelete');
   Route::get('/productedit/{id}', [ProductController::class, 'productedit'])->name('productedit');
   Route::POST('/productupdate', [ProductController::class, 'productupdate'])->name('productupdate');

  Route::post('/getcategory', [ProductController::class, 'getcategory'])->name('getcategory');
  


});
Route::get('/website.index', [SiteController::class, 'cat'])->name('website.index');
Route::post('/getcat', [SiteController::class, 'getcat'])->name('getcat');

Route::get('webs', [WebsiteController::class, 'index'])->name('web.index');

Route::get('website/shop', [WebsiteController::class, 'shop'])->name('web.shop');
Route::get('website/index', [WebsiteController::class, 'index'])->name('website.index');
Route::get('website/services', [WebsiteController::class, 'index'])->name('website.index');

Route::get('website/about', function () {
  return view('website.about');
})->name('website.about');
Route::get('website/services', function () {
  return view('website.services');
})->name('website.services');
Route::get('website/blog', function () {
  return view('website.blog');
})->name('website.blog');
Route::get('website/contact', function () {
  return view('website.contact');
})->name('website.contact');
Route::get('website/cart', function () {
  return view('website.cart');
})->name('website.cart');

Route::get('website/thankyou', function () {
  return view('website.thankyou');
})->name('website.thankyou');
Route::get('website/profile', function () {
  return view('website.profile');
})->name('website.profile');

Route::get('website/password', function () {
  return view('website.password');
})->name('website.password');



// Customer Controller


Route::get('website/login',[Customer::class, 'login'])->name('website.login');
Route::get('website/login',[Customer::class, 'login'])->name('website.login');

Route::post('website/edit',[Customer::class,'profileUpdate'])->name('website.profileupdate');
Route::post('website/login',[Customer::class, 'loginPost'])->name('website.login.post');
Route::get('website/registration',[Customer::class, 'registration'])->name('website.registration');
Route::post('website/registration',[Customer::class, 'registrationPost'])->name('website.registration.post');
Route::get('website/verification/{id}',[Customer::class,'verification']);
Route::post('website/verified',[Customer::class,'verifiedOtp'])->name('website.verifiedOtp');
Route::get('website/resend-otp',[Customer::class,'resendOtp'])->name('website.resendOtp');
Route::post('website/index',[Customer::class,'profileUpdate'])->name('website.profileupdate');
Route::get('image-upload',[Customer::class,'imageUpload'])->name('image');
Route::post('image-upload',[Customer::class,'imageUpload'])->name('image.store');
Route::get('website/change/password',[Customer::class,'changePassword'])->name('change.password');
Route::post('website/update/password',[Customer::class,'updatePassword'])->name('update.password');
Route::get('website/logout', [Customer::class, 'logout'])->name('website.logout');
Route::get('website/edit', function(){
  return view ('website.edit');
})->name('website.edit');

Route::get('website/cart', [WebsiteController::class, 'cart'])->name('cart');
Route::get('website/product-detail/{id}', [WebsiteController::class, 'show'])->name('website.product_detail');
Route::get('website/checkout/{id}',[WebsiteController::class, 'checkout'])->name('website.checkout');