<?php

use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\OrderContoller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [BookController::class,'home']);
Route::resource('/shopbook', BookController::class);
Route::resource('/cart', CartController::class)->middleware('auth');
Route::get('/checkout', [CheckOutController::class,'index']);
Route::post('/checkout',[CheckOutController::class,'checkout']);
Route::resource('/profile', ProfileController::class)->middleware('auth');
Route::resource('/history', HistoryController::class)->middleware('auth');
Route::get('/generate-pdfProduct',[BookController::class,'reportPDF']);
Route::get('/order',[OrderContoller::class,'index']);

Route::group(['prefix'=>'admin'],function(){
    Route::resource('/allbook', AdminBookController::class);
    Route::post('/toggle/{id}', [AdminBookController::class,'toggle']);
    Route::get('/reportall',[ReportController::class,'index']);
});

Route::post('/logout',[UserController::class,'logout']);
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/loginpost',[UserController::class,'loginpost']);
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/registerpost',[UserController::class,'registerpost']);
