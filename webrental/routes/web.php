<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Frontend\CarController;
use \App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Frontend\MidtransController;

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

// Route::get('/', [\App\Http\Controllers\Frontend\HomepageController::class, 'index']);
// Route::get('/cars', [\App\Http\Controllers\Frontend\CarController::class, 'index']);

// Route::get('/cars', 'Frontend\CarController@index');
Route::get('/', [HomepageController::class, 'index']);
Route::get('/about', function(){
    return view('frontend.about');
});
Route::get('/contact', function(){
    return view('frontend.contact');
});


Route::get('/cars', [CarController::class, 'index']);
Route::get('/cars/{id}', [CarController::class, 'show'])->name('car.details');

Route::get('/rent/{id}', [CarController::class, 'rent'])->name('rent');
Route::post('/rent', [CarController::class, 'submitRent'])->name('rent.submit');

Route::post('/midtrans-callback', [MidtransController::class, 'callback']);

Route::post('/payment-success', [CarController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');