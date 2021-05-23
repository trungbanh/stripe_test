<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/payment', [PaymentController::class, 'index']);
Route::post('/payment/transaction', [PaymentController::class, 'makePayment'])->name('make-payment');

Route::post('/user/subscribe',[ PaymentController::class,'makeSubscriptions'])->name('make-subscribe');
Route::get('/user/add-card',[ PaymentController::class,'addCard'])->name('add-card');
