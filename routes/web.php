<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
//Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'auth','middleware'=>['auth','isAdmin']],function(){
    Route::get('/dashboard', function () {
        return view('Backend.index');
    });
//Category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

//SubCategory
Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('subcategory.index');
Route::get('/subcategory/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
Route::post('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
Route::get('/subcategory/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');

//Product
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

});