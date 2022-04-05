<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Payment\TransactionController;
use App\Http\Controllers\Payment\TripayCallbackController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/film/{id}', [HomeController::class, 'film']);
Route::get('/search/{judul}', [HomeController::class, 'search']);
Route::get('/checkout/{id}', [HomeController::class, 'checkout'])->middleware(['auth']);

Route::group(['middleware' => ['auth']], function () {
    Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/transaction/{reference}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::post('/callback', [TripayCallbackController::class, 'handle'])->name('callback');

require __DIR__.'/auth.php';
