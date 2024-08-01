<?php

use App\Http\Controllers\SentimentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\DataController;
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
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::view('/confussion','predictions.confussion');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/data', [DataController::class, 'index'])->name('data');
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::resource('users', UserController::class);
    Route::resource('predictions', PredictionController::class);
    Route::get('/sentiment', [SentimentController::class,'index'])->name('sentiment.form');
    Route::post('/sentiment',[SentimentController::class, 'predict'])->name('sentiment.prediksi');
});


// Route::get('/dashboard', function(){
//     return view('admin.index');
// });

// Route::get('/tables-data', function(){
//     return view('layouts.tables-data');
// });

