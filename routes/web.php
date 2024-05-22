<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\admin\AdminLoginController;

use App\Http\Controllers\admin\HomeController;

use App\Http\Controllers\FrontController;

use App\Http\Controllers\admin\ProductController;

use App\Http\Controllers\admin\TempImagesController;

use App\Http\Controllers\CartController;

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontController::class,'index'])->name('front.home');
Route::get('/product/{slug}',[FrontController::class,'product'])->name('front.product');
Route::get('/profile',[FrontController::class,'profile'])->name('user.profile');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCartItem'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

// admin routes
Route::group(['prefix'=>'admin'],function(){
     Route::group(['middleware'=>'admin.guest'],function(){
        Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');
         Route::post('/register', [AdminLoginController::class, 'register'])->name('user.register');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
     });
     Route::group(['middleware'=>'admin.auth'],function(){
        Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');
     });

      //Product routes
      Route::get('/products',[ProductController::class,'index'])->name('products.index');
      Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
      Route::post('/products/store',[ProductController::class,'store'])->name('products.store');
      Route::get('/products/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
      Route::put('/products/{id}', [ProductController::class,'update'])->name('products.update');
      Route::delete('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');
      Route::get('/delete-product-image/{id}', [ProductController::class,'deleteProductImage'])->name('products.delete-product-image');

      //temp-images
      Route::post('/upload-temp-image',[TempImagesController::class,'create'])->name('temp-images.create');
      Route::delete('/temp-images/{id}', [TempImagesController::class, 'destroy'])->name('temp-images.destroy');
});

//user routes
Route::group(['prefix'=>'user'],function(){
   Route::group(['middleware'=>'guest'],function(){
      Route::get('/login',[AdminLoginController::class,'index'])->name('user.login');
       Route::post('/register', [AdminLoginController::class, 'register'])->name('user.register');
      Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('user.authenticate');
   });
   Route::group(['middleware'=>'auth'],function(){
     
      Route::get('/logout',[FrontController::class,'logout'])->name('user.logout');
   });
   });