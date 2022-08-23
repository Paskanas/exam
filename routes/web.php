<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RestorantController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Restorants
Route::prefix('restorants')->name('restorants-')->group(function () {
    Route::get('', [RestorantController::class, 'index'])->name('index')->middleware('rp:user');
    Route::get('create', [RestorantController::class, 'create'])->name('create')->middleware('rp:admin');
    Route::post('', [RestorantController::class, 'store'])->name('store')->middleware('rp:admin');
    Route::get('edit/{restorant}', [RestorantController::class, 'edit'])->name('edit')->middleware('rp:admin');
    Route::put('{restorant}', [RestorantController::class, 'update'])->name('update')->middleware('rp:admin');
    Route::delete('{restorant}', [RestorantController::class, 'destroy'])->name('delete')->middleware('rp:admin');
    Route::get('show/{id}', [RestorantController::class, 'show'])->name('show')->middleware('rp:user');
    Route::get('menus/{id}', [RestorantController::class, 'menus'])->name('menus')->middleware('rp:user');
});

// Menus
Route::prefix('menus')->name('menus-')->group(function () {
    Route::get('', [MenuController::class, 'index'])->name('index')->middleware('rp:user');
    Route::get('create', [MenuController::class, 'create'])->name('create')->middleware('rp:admin');
    Route::post('', [MenuController::class, 'store'])->name('store')->middleware('rp:admin');
    Route::get('edit/{menu}', [MenuController::class, 'edit'])->name('edit')->middleware('rp:admin');
    Route::put('{menu}', [MenuController::class, 'update'])->name('update')->middleware('rp:admin');
    Route::delete('{menu}', [MenuController::class, 'destroy'])->name('delete')->middleware('rp:admin');
    Route::get('show/{id}', [MenuController::class, 'show'])->name('show')->middleware('rp:user');
    Route::get('dishes/{id}', [MenuController::class, 'dishes'])->name('dishes')->middleware('rp:user');
});

// Dishes
Route::prefix('dishes')->name('dishes-')->group(function () {
    Route::get('', [DishController::class, 'index'])->name('index')->middleware('rp:user');
    Route::get('create', [DishController::class, 'create'])->name('create')->middleware('rp:admin');
    Route::post('', [DishController::class, 'store'])->name('store')->middleware('rp:admin');
    Route::get('edit/{dish}', [DishController::class, 'edit'])->name('edit')->middleware('rp:admin');
    Route::put('{dish}', [DishController::class, 'update'])->name('update')->middleware('rp:admin');
    Route::delete('{dish}', [DishController::class, 'destroy'])->name('delete')->middleware('rp:admin');
    Route::get('show/{id}', [DishController::class, 'show'])->name('show')->middleware('rp:user');
    Route::delete('delete-picture/{dish}', [DishController::class, 'deletePicture'])->name('delete-picture');
});

//Orders
Route::prefix('orders')->name('orders-')->group(function () {
    Route::get('', [OrderController::class, 'index'])->name('index')->middleware('rp:admin');
    Route::put('status/{order}', [OrderController::class, 'setStatus'])->name('status')->middleware('rp:admin');
});

Route::get('my-orders', [OrderController::class, 'showMyOrders'])->name('my-orders');
Route::post('add-hotel-to-order', [OrderController::class, 'add'])->name('order-add');

Route::prefix('home')->name('home-')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('index')->middleware('rp:user');
});
