<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
 Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/products',[ProductController::class,'store'])->name('product.store');

Route::delete('/product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');



Route::post('/shreya',[ProductController::class,'home']);
?>