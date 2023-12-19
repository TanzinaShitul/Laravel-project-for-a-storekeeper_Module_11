<?php

use App\Http\Controllers\homeController;

use Illuminate\Support\Facades\Route;






Route::get('/home',[homeController::class,'display'])->name('home');

Route::get('/home/addProduct',[homeController::class,'addProduct'])->name('home.add');



Route::delete('/home/deleteProduct/{id}',[homeController::class,'delete'])->name('home.delete');



//store a new product
Route::post('/home/store',[homeController::class,'store'])->name('home.store');

//view update page
Route::get('/home/updateProduct/{id?}',[homeController::class,'update'])->name('home.update');
//update Existing Product
Route::put('/home/update/{id}',[homeController::class,'updateProduct'])->name('product.update');

//view sell page
Route::get('/home/sellProduct/{id?}',[homeController::class,'sell'])->name('home.sell');
//sell product
Route::post('/home/sell/{id}',[homeController::class,'sellProduct'])->name('product.sell');

//view Dashboard
Route::get('/dashboard',[homeController::class,'viewDashboard'])->name('dashboard');

// view salesReport page
Route::get('/home/salesPage',[homeController::class,'salesReportPage'])->name('home.salesReport');
