<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFGenController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PriceListController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/test', [PDFGenController::class, 'show']);

Route::get('/gen/{orderId}', [PDFGenController::class, 'createInvoice']);

Route::resource('/orders', OrderController::class)->middleware(['auth']);

Route::resource('/pricelist', PriceListController::class);

require __DIR__.'/auth.php';
