<?php

use App\Http\Controllers\CashierController;
use App\Http\Controllers\LogisticController;
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
// Untuk Sementara
Route::get('',function (){
    return to_route('logistic.index');
});

// Logistic
Route::get('logistic/',[LogisticController::class, 'index'])->name('logistic.index');
Route::get('logistic/many-create',[LogisticController::class, 'manyCreate'])->name('logistic.create');
Route::get('logistic/many-edit',[LogisticController::class, 'manyEdit'])->name('logistic.edit');

// Cashier
Route::get('cashier/',[CashierController::class, 'index'])->name('cashier.index');
Route::get('cashier/checkout',[CashierController::class, 'checkout'])->name('cashier.checkout');