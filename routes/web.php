<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;

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

Route::get('/userRegister',[CustomerController::class,'newUser'])->name('new.user');
Route::post('/userSave',[CustomerController::class,'saveUser'])->name('save.user');
Route::get('/loginPage',[CustomerController::class,'loginPage'])->name('login.page');
Route::post('/userLogin',[CustomerController::class,'userLoginCheck'])->name('user.login.check');
Route::get('/userLogout',[CustomerController::class,'userLogout'])->name('user.logout');


Route::get('/cartPage',[CartController::class,'cartPage'])->name('cart.page');
Route::get('/addItem/{id}',[CartController::class,'addItem'])->name('item.add');


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/detail/{id}',[HomeController::class,'detailProduct'])->name('details.product');
Route::get('/shopPage',[HomeController::class,'showProducts'])->name('all.products');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');

    Route::get('/userManage',[AdminController::class,'manageUser'])->name('user.manage');
    Route::get('/userEdit/{id}',[AdminController::class,'userEdit'])->name('edit.user');
    Route::post('/updateUser',[AdminController::class,'updateUser'])->name('update.user');

    Route::get('/productEntry',[ProductController::class,'addProduct']) ->name('add.product');
    Route::get('/products',[ProductController::class,'manageProduct']) ->name('manage.product');
    Route::post('/enterProduct',[ProductController::class,'enterProduct'])->name('enter.product');
    Route::get('/changeProductState/{id}',[ProductController::class,'changeState'])->name('edit.product.state');
    Route::get('/editProduct/{id}',[ProductController::class,'editProduct'])->name('edit.product');
    Route::post('/updateProduct',[ProductController::class,'updateProduct'])->name('update.product');
    Route::post('/deleteProduct',[ProductController::class,'deleteProduct'])->name('delete.product');

    Route::get('/brand',[BrandController::class,'brandPage'])->name('brand');
    Route::post('/saveBrand',[BrandController::class,'saveBrand'])->name('save.brand');
    Route::get('/changeBrandState/{id}',[BrandController::class,'changeState']) ->name('edit.state');
    Route::get('/editBrand/{id}',[BrandController::class,'editBrand'])->name('edit.brand');
    Route::post('/updateBrand',[BrandController::class,'updateBrand'])->name('update.brand');
    Route::post('/deleteBrand',[BrandController::class,'deleteBrand'])->name('delete.brand');

    Route::get('/category',[CategoryController::class,'categoryPage'])->name('category');
    Route::post('/saveCategory',[CategoryController::class,'saveCategory'])->name('save.category');
    Route::get('/changeCategoryState/{id}',[CategoryController::class,'changeState'])->name('edit.cat.state');
    Route::get('/editCategory/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
    Route::post('/updateCategory',[CategoryController::class,'updateCategory'])->name('update.category');
    Route::post('/deleteCategory',[CategoryController::class,'deleteCategory'])->name('delete.category');
});
