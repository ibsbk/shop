<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Models\Order;
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

Route::get('/',[UserController::class,'mainView'])->name('/');
Route::post('/',[UserController::class,'mainPost']);

Route::get('/reg',[UserController::class,'regView'])->name('reg');
Route::post('/reg',[UserController::class,'regPost']);

Route::get('/auth',[UserController::class,'authView'])->name('auth');
Route::post('/auth',[UserController::class,'authPost']);

Route::get('/lk',[UserController::class,'lkView'])->name('lk')->middleware('guestRedirect');

Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/cart',[UserController::class,'cartView'])->name('cart');
Route::post('/cart',[UserController::class,'cartPost']);

Route::get('/orderConfirmation',[OrderController::class,'confirmationView'])->name('confirmation')->middleware('guestRedirect');
Route::post('/orderConfirmation',[OrderController::class,'confirmationPost']);

Route::get('/orderDetails/{order}',[OrderController::class,'orderDetailsView'])->middleware('guestRedirect');
Route::post('/orderDetails/{order}',[OrderController::class,'orderDetailsPost']);

Route::get('/adminLk',[AdminController::class,'adminLkView'])->name('adminLk')->middleware('guestRedirect')->middleware('notAdminRedirect');

Route::get('/makeProduct',[AdminController::class,'makeProductView'])->name('makeProduct')->middleware('guestRedirect')->middleware('notAdminRedirect');
Route::post('/makeProduct',[AdminController::class,'makeProductPost'])->middleware('guestRedirect')->middleware('notAdminRedirect');