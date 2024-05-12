<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminLoginController;

use App\Http\Controllers\admin\HomeController;

use App\Http\Controllers\admin\ProductController;

use App\Http\Controllers\admin\TempImagesController;

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

Route::get('/', function () {
    return view('index');
})->name('mainhome');

Route::group(['prefix'=>'admin'],function(){
     Route::group(['middleware'=>'admin.guest'],function(){
        Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');
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
      //temp-images.create
      Route::post('/upload-temp-image',[TempImagesController::class,'create'])->name('temp-images.create');
});