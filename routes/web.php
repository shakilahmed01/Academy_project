<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/customer/index', [CustomerController::class, 'index'])->name('customer.index')->middleware('auth');
Route::get('/customer/list', [CustomerController::class, 'list'])->name('customer.list')->middleware('auth');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit')->middleware('auth');
Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete')->middleware('auth');
Route::post('/customer/update', [CustomerController::class, 'update'])->name('customer.update')->middleware('auth');
Route::post('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
