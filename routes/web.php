<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SMSController;
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
    return view('welcome');
});

Route::any('payment-page', [PaymentController::class, 'index']);
Route::any('verify-payment', [PaymentController::class, 'verify']);
Route::get('verify-payments', [PaymentController::class, 'store']);
Route::any('send-sms', [SMSController::class, 'send']);
