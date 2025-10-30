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

Route::get('/customer/index', [CustomerController::class, 'index'])->name('customer.index');
Route::post('/customer/create', [App\Http\Controllers\Customer\CustomerController::class, 'create'])->name('customer.create');
