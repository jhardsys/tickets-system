<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Register\RegisterController;

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

Route::resource('/', LoginController::class);

Route::resource('/register', RegisterController::class);
