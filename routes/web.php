<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;

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
