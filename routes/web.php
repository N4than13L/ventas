<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Models\Client;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/settings', [UserController::class, 'index'])->name('settings');

Route::post('/settings/save', [UserController::class, 'save'])->name('settings.save');

Route::get('/settings/change', [UserController::class, 'change'])->name('user.change');

Route::post('/settings/change/{id}', [UserController::class, 'change_password'])->name('user.change_password');


// cuentas.
Route::get('/account/index', [AccountController::class, 'index'])->name('account.index');

Route::get('/account/add', [AccountController::class, 'add'])->name('account.add');

Route::post('/account/save', [AccountController::class, 'save'])->name('account.save');

Route::get('/account/edit/{id}', [AccountController::class, 'edit'])->name('account.edit');

Route::post('/account/update/{id}', [AccountController::class, 'update'])->name('account.update');

Route::get('/account/delete/{id}', [AccountController::class, 'delete'])->name('account.delete');

// suplidores.
Route::get('/supplier/index', [SupplierController::class, 'index'])->name('supplier.index');

Route::get('/supplier/add', [SupplierController::class, 'add'])->name('supplier.add');

Route::post('/supplier/save', [SupplierController::class, 'save'])->name('supplier.save');

Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');

Route::post('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');

Route::get('/supplier/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');

// productos.
Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');

Route::get('/product/add', [ProductController::class, 'add'])->name('product.add');

Route::post('/product/save', [ProductController::class, 'save'])->name('product.save');

Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');

Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

// cliente.
Route::get('/client/index/', [ClientController::class, 'index'])->name('client.index');

Route::get('/client/add/', [ClientController::class, 'add'])->name('client.add');

Route::post('/client/save', [ClientController::class, 'save'])->name('client.save');

Route::get('/client/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');

Route::post('/client/update/{id}', [ClientController::class, 'update'])->name('client.update');

Route::get('/client/delete/{id}', [ClientController::class, 'delete'])->name('client.delete');
