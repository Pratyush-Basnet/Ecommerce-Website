<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product',[App\Http\Controllers\HomeController::class,'product'])->name('product');
Route::get('/checkout',[App\Http\Controllers\HomeController::class,'checkout'])->name('checkout');
Route::get('/checkout/delete/{id}',[App\Http\Controllers\HomeController::class,'checkoutdelete']);
Route::get('detail/{id}',[App\Http\Controllers\HomeController::class,'detail']);
Route::get('userproductdetail/{id}',[App\Http\Controllers\HomeController::class,'userproductdetail']);
Route::post('add-to-cart',[App\Http\Controllers\HomeController::class,'add_to_cart']);
Route::get('/motorcycle',[App\Http\Controllers\HomeController::class,'motorcycle'])->name('motorcycle');
Route::get('motorcycledetail/{id}',[App\Http\Controllers\HomeController::class,'motorcycle_detail']);
Route::get('/placeorder/{item}',[App\Http\Controllers\HomeController::class,'addorder'])->name('addorder');
Route::post('/addingorder/{item}',[App\Http\Controllers\HomeController::class,'addingorder'])->name('addingorder');

Route::get('/checkoutform',[App\Http\Controllers\HomeController::class,'checkoutform'])->name('checkoutform');
Route::get('/user_display_products',[App\Http\Controllers\HomeController::class,'userproduct'])->name('userproduct');
Route::get('/userdashboard',[App\Http\Controllers\HomeController::class,'userdashboard'])->name('user.dashboard');
Route::post('/review',[App\Http\Controllers\HomeController::class,'review'])->name('review');

Route::get('userdashboard/category',[App\Http\Controllers\UsercategoryController::class, 'index']);
Route::get('userdashboard/category/manage_category',[App\Http\Controllers\UsercategoryController::class, 'manage_category']);
Route::get('userdashboard/category/manage_category/{id}',[App\Http\Controllers\UsercategoryController::class,'manage_category']);
Route::post('userdashboard/category/manage_category_process',[App\Http\Controllers\UsercategoryController::class,'manage_category_process'])->name('user.manage_category_process');
Route::get('userdashboard/category/delete/{id}',[App\Http\Controllers\UsercategoryController::class,'delete']);
Route::get('userdashboard/category/status/{status}/{id}',[App\Http\Controllers\UsercategoryController::class,'status']);

Route::get('userdashboard/product',[App\Http\Controllers\UserproductController::class,'index']);
Route::get('userdashboard/product/manage_product',[App\Http\Controllers\UserproductController::class,'manage_product']);
Route::get('userdashboard/product/manage_product/{id}',[App\Http\Controllers\UserproductController::class,'manage_product']);
Route::post('userdashboard/product/manage_product_process',[App\Http\Controllers\UserproductController::class,'manage_product_process'])->name('userdashboard.manage_product_process');
Route::get('userdashboard/product/delete/{id}',[App\Http\Controllers\UserproductController::class,'delete']);
Route::get('userdashboard/product/status/{status}/{id}',[App\Http\Controllers\UserproductController::class,'status']);
Route::get('userdashboard/product/product_images_delete',[App\Http\Controllers\UserproductController::class,'product_images_delete']);





Route::get('admin/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home')->middleware('IsAdmin');


Route::get('admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home')->middleware('IsAdmin');


Route::get('admin/category',[App\Http\Controllers\CategoryController::class, 'index'])->middleware('IsAdmin');

Route::get('admin/category/manage_category',[App\Http\Controllers\CategoryController::class, 'manage_category'])->middleware('IsAdmin');

Route::get('admin/category/manage_category/{id}',[App\Http\Controllers\CategoryController::class,'manage_category'])->middleware('IsAdmin');

Route::post('admin/category/manage_category_process',[App\Http\Controllers\CategoryController::class,'manage_category_process'])->name('category.manage_category_process')->middleware('IsAdmin');

Route::get('admin/category/delete/{id}',[App\Http\Controllers\CategoryController::class,'delete'])->middleware('IsAdmin');

Route::get('admin/category/status/{status}/{id}',[App\Http\Controllers\CategoryController::class,'status'])->middleware('IsAdmin');



Route::get('admin/product',[App\Http\Controllers\ProductController::class,'index'])->middleware('IsAdmin');

Route::get('admin/product/manage_product',[App\Http\Controllers\ProductController::class,'manage_product']);

Route::get('admin/product/manage_product/{id}',[App\Http\Controllers\ProductController::class,'manage_product']);

Route::post('admin/product/manage_product_process',[App\Http\Controllers\ProductController::class,'manage_product_process'])->name('product.manage_product_process');

Route::get('admin/product/delete/{id}',[App\Http\Controllers\ProductController::class,'delete']);

Route::get('admin/product/status/{status}/{id}',[App\Http\Controllers\ProductController::class,'status']);

Route::get('admin/product/product_images_delete',[App\Http\Controllers\ProductController::class,'product_images_delete']);

Route::get('admin/home_banner',[App\Http\Controllers\HomeBannerController::class,'index']);
Route::get('admin/home_banner/manage_home_banner',[App\Http\Controllers\HomeBannerController::class,'manage_home_banner']);
Route::get('admin/home_banner/manage_home_banner/{id}',[App\Http\Controllers\HomeBannerController::class,'manage_home_banner']);
Route::post('admin/home_banner/manage_home_banner_process',[App\Http\Controllers\HomeBannerController::class,'manage_home_banner_process'])->name('home_banner.manage_home_banner_process');
Route::get('admin/home_banner/delete/{id}',[App\Http\Controllers\HomeBannerController::class,'delete']);
Route::get('admin/home_banner/status/{status}/{id}',[App\Http\Controllers\HomeBannerController::class,'status']);



Route::get('admin/motorcycle',[App\Http\Controllers\MotercycleController::class,'index'])->middleware('IsAdmin');

Route::get('admin/motorcycle/manage_motorcycle',[App\Http\Controllers\MotercycleController::class,'manage_motorcycle']);

Route::get('admin/motorcycle/manage_motorcycle/{id}',[App\Http\Controllers\MotercycleController::class,'manage_motorcycle']);

Route::post('admin/motorcycle/manage_motorcycle_process',[App\Http\Controllers\MotercycleController::class,'manage_motorcycle_process'])->name('motercylce.manage_motorcycle_process');

Route::get('admin/motorcycle/delete/{id}',[App\Http\Controllers\MotercycleController::class,'delete']);

Route::get('admin/motorcycle/status/{status}/{id}',[App\Http\Controllers\MotercycleController::class,'status']);

Route::get('admin/product/motorcycle_images_delete',[App\Http\Controllers\MotercycleController::class,'product_images_delete']);


// user routes

Route::get('admin/user',[App\Http\Controllers\UserController::class,'user'])->name('user.admin');
Route::get('admin/user/delete/{id}',[App\Http\Controllers\UserController::class,'delete'])->name('user.delete');



Route::get('admin/listed',[App\Http\Controllers\DisplaylistedController::class,'userdisplay'])->name('listed.admin');
Route::get('admin/listed/delete/{id}',[App\Http\Controllers\DisplaylistedController::class,'delete'])->name('listed.delete');


Route::get('admin/review',[App\Http\Controllers\DisplaylistedController::class,'userreview'])->name('review.admin');
Route::get('admin/review/delete/{id}',[App\Http\Controllers\DisplaylistedController::class,'deletereview'])->name('review.delete');

Route::get('admin/order',[App\Http\Controllers\DisplaylistedController::class,'order'])->name('order.admin');
Route::get('admin/order/delete/{id}',[App\Http\Controllers\DisplaylistedController::class,'deleteorder'])->name('order.delete');
