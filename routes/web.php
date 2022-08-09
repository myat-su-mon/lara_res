<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WaiterController;
use App\Http\Controllers\KitchenController;

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

Route::get('/', [WaiterController::class, 'index'])->name('order.form');
Route::post('order_submit', [WaiterController::class, 'submit'])->name('order.submit');

Route::resource('/dish', KitchenController::class);
Route::get('/order', [KitchenController::class, 'order'])->name('kitchen.order');
Route::get('/order/{order}/approve', [KitchenController::class, 'approve']);
Route::get('/order/{order}/cancel', [KitchenController::class, 'cancel']);
Route::get('/order/{order}/ready', [KitchenController::class, 'ready']);

Route::get('/order/{order}/serve', [WaiterController::class, 'serve']);

Auth::routes([
    'register' => false, // registration routes
    'reset' => false, // password reset routes
    'verify' => false, // email verification routes
    'confirm' => false,
]);
