<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\RegisterController;;
use App\Http\Controllers\DashboardStockController;

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
// route login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// route logout
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/logout', [LoginController::class, 'logout']);

// route reset password
Route::get('/reset', function (){
  return view('resetPassword.index');
})->middleware('guest')->name('reset');

// route register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// route outlet
Route::resource('/dashboard/outlet', OutletController::class)->middleware('auth');

// route export pdf
Route::get('/dashboard/exportpdf', [DashboardController::class, 'exportpdf'])->middleware('auth')->name('exportpdf');

//route export excel 
Route::get('/dashboard/exportexcel', [DashboardController::class, 'stock_barangexport'])->middleware('auth')->name('exportexcel');

// route resource table
Route::resource('/dashboard/tables', DashboardStockController::class)->parameters(['id' => 'outlet_id'])->middleware('auth');