<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;         // from /ProductController + name of controller

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/product',[ProductController::class, 'index'])->name('product.index');   //index = any name    product.index = home page
Route::get('/product/create',[ProductController::class, 'create'])->name('product.create');   //create
Route::post('/product',[ProductController::class, 'store'])->name('product.store');     //store
Route::get('/product/{product}/edit',[ProductController::class, 'edit'])->name('product.edit');     //get because it is only edit page
Route::put('/product/{product}/update',[ProductController::class, 'update'])->name('product.update');     //route::put for update
Route::delete('/product/{product}/destroy',[ProductController::class, 'destroy'])->name('product.destroy');     //delete route     //delete or destroy
